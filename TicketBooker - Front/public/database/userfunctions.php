<?php include "db.php" ?>
<?php

function createUser($username,$email,$password,$accountType){
    echo "I'm here";
    if(isset($_POST['submit'])){
        global $connection;
        
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users(username,email,password,accountType) ";
        $query .= "VALUES ('$username','$email','$hashedPassword','$accountType')";
        $result = mysqli_query($connection,$query);
        if(!$result){
           die('Query FAILED' . mysqli_error());
        } else {
           echo "Record Created";
           return true;
        }
    }
        
    }

    function logInUser($email, $password) {
        global $connection;
    
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $query);
    
        if (!$result) {
            die('Query FAILED' . mysqli_error($connection));
        }
    
        $user = mysqli_fetch_assoc($result);
    
        if ($user) {
            echo $password;
            echo $user['password'];
            // User found, verify password
            if (password_verify($password, $user['password'])) {
                session_start();
            
            // Store user information in the session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['username']; // Assuming you have a 'name' column
                echo "Login successful"; 
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        }
    }

    function updateUserInfos($email,$password){
        if(isset($_POST['save'])){
            global $connection;

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password' ";
            $query .= "WHERE email = $email ";

            $result = mysqli_query($connection,$query);
            if(!$result){
                die('Query FAILED' . mysqli_error($connection));
            } else {
                echo "Record Updated";
           }
        }
    }
?>