<?php
session_start();
require 'db.php'; // Ensure you have included the database connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $announcementTitle = $_POST["announcementTitle"];
    $announcementText = $_POST["announcementText"];


    $stmt = $conn->prepare("INSERT INTO announcements (Title, Content) VALUES (?, ?)");
    $stmt->bind_param("ss", $announcementTitle, $announcementText);

    // Execute the statement
    if ($stmt->execute()) {
        // Update was successful
        header('Location: employeeManagement.php?success=1'); // Redirect with a success message

    } else {
        // Handle errors, e.g., print a message or log it
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

else{
    header("Location: employeeManagement.php");
}