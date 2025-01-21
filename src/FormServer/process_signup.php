<?php

$servername = "localhost";
$username = "root";
$password = ""; // Your MySQL password
$dbname = "form_data";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Validate data
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        // Successful signup, send a welcoming message
        echo "Signup successful! Welcome, " . $name;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
