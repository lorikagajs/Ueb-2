<?php include "db.php"
?>
<?php

// Function to insert user data into the database
function createUser($firstName, $lastName, $username, $email, $password, $userType)
{
    global $conn; // Access the database connection object
    
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
        return true; // User inserted successfully
    } else {
        // Print the error message
        echo "Error: " . $stmt->error;
        return false; // Failed to insert user
    }
}

function authenticateUser($email, $password) {
    global $conn; // Assuming $conn is your database connection object

    // Retrieve hashed password from the database based on the provided email
    $query = "SELECT password_hash FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // User found, verify password
        $userData = $result->fetch_assoc();
        $hashedPassword = $userData['password_hash'];

        // Verify password
        if (password_verify($password, $hashedPassword)) {
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

    // Close statement
    $stmt->close();
}



// function createUser($username, $email, $password, $accountType)
// {
//     echo "I'm here";
//     if (isset($_POST['submit'])) {
//         global $connection;

//         // Hash the password before storing it
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//         $query = "INSERT INTO users(username,email,password,accountType) ";
//         $query .= "VALUES ('$username','$email','$hashedPassword','$accountType')";
//         $result = mysqli_query($connection, $query);
//         if (!$result) {
//             die('Query FAILED' . mysqli_error());
//         } else {
//             echo "Record Created";
//             return true;
//         }
//     }
// }

// function logInUser($email, $password)
// {
//     global $connection;

//     $query = "SELECT * FROM users WHERE email='$email'";
//     $result = mysqli_query($connection, $query);

//     if (!$result) {
//         die('Query FAILED' . mysqli_error($connection));
//     }

//     $user = mysqli_fetch_assoc($result);

//     if ($user) {
//         echo $password;
//         echo $user['password'];

//         if (password_verify($password, $user['password'])) {
//             session_start();
//             $_SESSION['user_id'] = $user['id'];
//             $_SESSION['user_email'] = $user['email'];
//             $_SESSION['user_name'] = $user['username']; 
//             echo "Login successful";
//         } else {
//             echo "Invalid password";
//         }
//     } else {
//         echo "User not found";
//     }
// }

// function updateUserInfos($email, $password)
// {
//     if (isset($_POST['save'])) {
//         global $connection;

//         $username = $_POST['username'];
//         $email = $_POST['email'];
//         $password = $_POST['password'];
//         $query = "UPDATE users SET ";
//         $query .= "username = '$username', ";
//         $query .= "password = '$password' ";
//         $query .= "WHERE email = $email ";

//         $result = mysqli_query($connection, $query);
//         if (!$result) {
//             die('Query FAILED' . mysqli_error($connection));
//         } else {
//             echo "Record Updated";
//         }
//     }
// }
?>