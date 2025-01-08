<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mental_health_supporter";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the role and other form data
    $role = $_POST['role'];

    // Initialize variables
    $username = $email = $address = $password = $acquaintance = $caregiver = "";

    // Sanitize and retrieve data based on role
    switch ($role) {
        case 'user':
            $username = $conn->real_escape_string($_POST['username']);
            $email = $conn->real_escape_string($_POST['email']);
            $address = $conn->real_escape_string($_POST['address']);
            $acquaintance = $conn->real_escape_string($_POST['acquaintance']);
            $caregiver = $conn->real_escape_string($_POST['caregiver']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (role, username, email, address, acquaintance, caregiver, password) VALUES ('$role', '$username', '$email', '$address', '$acquaintance', '$caregiver', '$password')";
            break;

        case 'caregiver':
            $username = $conn->real_escape_string($_POST['caregiverUsername']);
            $email = $conn->real_escape_string($_POST['caregiverEmail']);
            $address = $conn->real_escape_string($_POST['caregiverAddress']);
            $password = password_hash($_POST['caregiverPassword'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO caregivers (role, username, email, address, password) VALUES ('$role', '$username', '$email', '$address', '$password')";
            break;

        case 'consultant':
            $username = $conn->real_escape_string($_POST['consultantUsername']);
            $email = $conn->real_escape_string($_POST['consultantEmail']);
            $password = password_hash($_POST['consultantPassword'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO consultants (role, username, email, password) VALUES ('$role', '$username', '$email', '$password')";
            break;

        case 'acquaintance':
            $username = $conn->real_escape_string($_POST['acquaintanceUsername']);
            $email = $conn->real_escape_string($_POST['acquaintanceEmail']);
            $address = $conn->real_escape_string($_POST['acquaintanceAddress']);
            $acquaintanceName = $conn->real_escape_string($_POST['acquaintanceName']);
            $password = password_hash($_POST['acquaintancePassword'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO acquaintances (role, username, email, address, acquaintance_name, password) VALUES ('$role', '$username', '$email', '$address', '$acquaintanceName', '$password')";
            break;

        default:
            echo "Invalid role selected.";
            exit;
    }

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>