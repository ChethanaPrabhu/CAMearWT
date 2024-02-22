<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cameradatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('Login successful!'); window.location='index.html';</script>";
        exit(); 
    } else {
        echo "<script>alert('Invalid username or password. Please try again.'); window.location='login.html';</script>";
        exit(); 
    }
}

$conn->close();
?>
