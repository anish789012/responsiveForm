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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database
    $sql = "SELECT id, name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['name'];
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found with this email!";
    }

    $stmt->close();
}

$conn->close();
?>
