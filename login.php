<?php
// Start the session
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Use your database password
$dbname = "mental_health_supporter";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Escape user inputs to prevent SQL injection
    $userID = $conn->real_escape_string($_POST['userID']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if the user exists
    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Compare plain-text password directly (this is fine if you're storing plain text passwords)
        if ($password === $user['password']) {
            // Save user session and redirect to the log mood page
            $_SESSION['userID'] = $userID;
            header("Location: logmood.html"); // Replace with the correct page after login
            exit();
        } else {
            // Invalid password, redirect back to login page with error
            header("Location: login.php?error=Invalid password. Please try again.");
            exit();
        }
    } else {
        // UserID not found, redirect back to login page with error
        header("Location: login.php?error=UserID not found. Please check and try again.");
        exit();
    }
}

// Close the connection
$conn->close();
?>

