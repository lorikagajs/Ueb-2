<?php
include "db.php";
include './database/utils/email.php';

function error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
    // Your error handling logic here
    echo "Error: [$errno] $errstr\n";
    echo "Error on line $errline in $errfile\n";
}

set_error_handler("error_handler");

function isAuth() {
    if (isset($_SESSION['is_loggedIn']) && $_SESSION['is_loggedIn']) {
        return true;
    }
    return false;
}

// Function to insert user data into the database
function createUser($firstName, $lastName, $username, $email, $password, $userType)
{
    global $conn; // Access the database connection object

    try {
        // Generate a random salt
        $salt = bin2hex(random_bytes(16));

        // Hash the password with the salt using bcrypt
        $hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password_hash, salt, user_type) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters to the statement
        $stmt->bind_param("sssssss", $firstName, $lastName, $username, $email, $hashedPassword, $salt, $userType);

        // Execute the statement
        if ($stmt->execute()) {
            sendEmail($email, 'Welcome', 'new user', $firstName);
            return true; // User inserted successfully
        } else {
            // Print the error message
            throw new Exception("Failed to insert user");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false; // Failed to insert user
    }
}

function authenticateUser($email, $password) {
    global $conn; // Assuming $conn is your database connection object

    try {
        // Retrieve hashed password from the database based on the provided email
        $query = "SELECT password_hash,salt FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // User found, verify password
            $userData = $result->fetch_assoc();
            $hashedPassword = $userData['password_hash'];
            $salt = $userData['salt'];
            // Verify password
            if (password_verify($password . $salt, $hashedPassword)) {
                // Password is correct
                return true;
            } else {
                // Invalid password
                return false;
            }
        } else {
            // User not found
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false; // Failed to authenticate user
    } finally {
        // Close statement
        if (isset($stmt)) {
            $stmt->close();
        }
    }
}

// Example of using try-catch with updateUserInfos (assuming its implementation)
/*
function updateUserInfos($email, $password)
{
    global $connection;

    try {
        if (isset($_POST['save'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password' ";
            $query .= "WHERE email = $email ";

            $result = mysqli_query($connection, $query);
            if (!$result) {
                throw new Exception('Query FAILED' . mysqli_error($connection));
            } else {
                echo "Record Updated";
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
*/

// Wrap other functions (e.g., updateUserInfos, logInUser, etc.) in similar try-catch blocks as needed

?>
