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

function authenticateUser($email, $password)
{
    global $conn; // Access the database connection object
    
    // Prepare the SQL statement to fetch user data based on email
    $stmt = $conn->prepare("SELECT id, password_hash, salt FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if user with the provided email exists
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $storedPasswordHash = $user['password_hash'];
        $salt = $user['salt'];
        
        // Generate the hash of the provided password using the stored salt
        $providedPasswordHash = password_hash($password . $salt, PASSWORD_BCRYPT);
        
        // Compare the generated hash with the stored password hash
        if (password_verify($providedPasswordHash, $storedPasswordHash)) {
            return $user['id']; // Return the user ID if authentication succeeds
        } else {
            return false; // Return false if authentication fails
        }
    } else {
        return false; // Return false if user does not exist
    }
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