<?php
// Database credentials
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "reglog";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST["username"];
$password = $_POST["password"];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement to insert user data into the database
$stmt = $conn->prepare("INSERT INTO tb_user (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    // Registration successful
    echo "Registration successful. You can now <a href='index.php'>sign in</a>.";
} else {
    // Registration failed
    echo "Error: " . $conn->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
