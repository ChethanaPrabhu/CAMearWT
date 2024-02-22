<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameradatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];

    // Validate phone number
    if (!preg_match('/^\d{10}$/', $phone)) {
        echo "Invalid phone number. Please enter exactly 10 digits.";
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $sql = "INSERT INTO users (phone, username, password) VALUES ('$phone', '$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully";
            header("Location: index.html");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Passwords do not match";
    }
}

$conn->close();
?>
