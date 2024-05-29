<?php
include "./database/db.php";
$response = false;
$newUsername = $_POST['username'];
$newEmail = $_POST['email'];
$newPassword = $_POST['newPassword'];
$oldPassword = $_POST['oldPassword'];
$userId = $_SESSION['user_id'];

// Prepare and execute a query to select the salt and hashed password from the database
$stmt_select = $conn->prepare("SELECT password_hash, salt FROM users WHERE id = ?");
$stmt_select->bind_param("i", $userId);
if (!$stmt_select->execute()) {
    die("Execute failed: (" . $stmt_select->errno . ") " . $stmt_select->error);
}

// Bind the result variables
$stmt_select->bind_result($dbHashedPassword, $salt);

// Fetch the result
$stmt_select->fetch();

// Close the statement
$stmt_select->close();

// Concatenate the provided password with the retrieved salt and hash it
$hashedPasswordWithSalt = password_hash($oldPassword . $salt, PASSWORD_BCRYPT);

// Check if the concatenated password matches the one stored in the database
if (!password_verify($hashedPasswordWithSalt, $dbHashedPassword)) {
    die("Incorrect old password");
}

// Prepare the update statement
$stmt_update = $conn->prepare("UPDATE users SET username = ?, email = ?, password_hash = ? WHERE id = ?");

// Hash the new password
$hashedPassword = password_hash($newPassword . $salt, PASSWORD_BCRYPT);

// Bind parameters
$stmt_update->bind_param("sssi", $newUsername, $newEmail, $hashedPassword, $userId);

// Execute the update statement
if (!$stmt_update->execute()) {
    die("Execute failed: (" . $stmt_update->errno . ") " . $stmt_update->error);
}

// Set response to true
$response = true;

// Close the update statement
$stmt_update->close();

?>
