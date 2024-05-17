<?php
session_start();

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

// Prepare and execute SQL statement to retrieve user data
$stmt = $conn->prepare("SELECT id, password FROM tb_user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $hashed_password = $row["password"];

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Authentication successful
        $_SESSION["username"] = $username;
        header("Location: quiz.php");
        exit;
    } else {
        // Invalid password
        echo "Invalid username or password.";
    }
} else {
    // User not found
    echo "Invalid username or password.";
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
