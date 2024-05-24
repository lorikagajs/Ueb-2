<?php

// Database configuration
$servername = "localhost:3308";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "ticketbooker"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful message for testing purposes
echo "Connected successfully";




// $connection = mysqli_connect('localhost:3307','root','','tickets');
// // if(!$connection){
// //     die("Database connection failed");
// // }
// if($connection){
//     echo "It worked";
// } else {
//     echo "It didn't work";
// }
?>