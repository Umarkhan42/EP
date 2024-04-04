<?php
// Start the session if you plan to use sessions
session_start();

// Include the database connection
include 'db.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data 
    $name = $_POST['employee_name'];
    $type = $_POST['leave_type'];
    $start = $_POST['start_date'];
    $end = $_POST['end_date'];
    $reason = $_POST['reason'];

    // Prepare an INSERT statement to add the data into the request table
    $stmt = $conn->prepare("INSERT INTO request (name, type, start, end, reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $type, $start, $end, $reason);

    // Execute the statement and check if it's successful
    if ($stmt->execute()) {
        header('Location: timeoff.php');
    } else {
        // Handle errors
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If not a POST request, handle the error or redirect
    echo "Invalid request method.";
}
?>