<?php
session_start();
require 'db.php'; // Ensure you have included the database connection

if (!isset($_SESSION['email'])) {
    // If the user is not logged in, redirect to the login page.
    header('Location: index.php');
    exit();
}

// Check if the form data is set for approval or disapproval
if (isset($_POST['action'], $_POST['name'])) {
    $action = $_POST['action']; // Should be 'Approve' or 'Disapprove'
    $name = $_POST['name']; // Using 'name' to uniquely identify the request

    // Convert action to a value for the 'approved' column ('yes' or 'no')
    $approved = ($action == 'Approve') ? 'yes' : 'no';

    $query = "UPDATE request SET approved = ? WHERE name = ?";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("ss", $approved, $name);
    if ($stmt->execute()) {
        // Approval or disapproval was successful, redirects back to employeeManagement.php
        header('Location: employeeManagement.php');
        exit();
    } else {
        // Handle execute error
        echo "Execute failed: " . $stmt->error;
    }
} else {
    // Form data not set correctly
    echo "Required data is missing.";
}
?>