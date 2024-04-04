<?php
session_start();
require 'db.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("INSERT INTO employees (name, dob, address, postcode, phone, email, role, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $dob, $address, $postcode, $phone, $email, $role, $password);

    // Execute the statement
    if ($stmt->execute()) {
        // Update was successful
        header('Location: employeeManagement.php'); 

    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

else{
    header("Location: employeeManagement.php");
}