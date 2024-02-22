<?php

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cameradatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$description = $_POST['description'];



    $sql = "INSERT INTO customer (name, phone, description) 
            VALUES ('$name', '$phone', '$description') ";


//SQL statement
if ($conn->multi_query($sql) === TRUE) {
    echo "<script>alert('Customer information stored successfully!'); 
    window.location='index.html';</script>";
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
