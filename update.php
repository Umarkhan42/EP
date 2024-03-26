<?php
session_start();
require 'db.php'; // Ensure you have included the database connection

if (!isset ($_SESSION['email'])) {
    // If the user is not logged in, redirect to the login page.
    header('Location: index.php');
    exit();
}

// Check if the form data is set
if (isset ($_POST['name'], $_POST['dob'], $_POST['address'], $_POST['postcode'], $_POST['phone'], $_POST['email'])) {
    $email = $_SESSION['email']; // The user's current email to identify the record
    $newEmail = $_POST['email']; // New email from the form
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];

    // Prepare an UPDATE statement to update the user's details
    $query = "UPDATE Employees SET Name=?, DoB=?, Address=?, Postcode=?, Phone=?, Email=? WHERE Email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $name, $dob, $address, $postcode, $phone, $newEmail, $email);

    if ($stmt->execute()) {
        // Update was successful
        $_SESSION['email'] = $newEmail; // Update the email in the session if it was changed
        header('Location: updateinfo.php?success=1'); // Redirect with a success message
    } else {
        // Handle errors, e.g., print a message or log it
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Not all form fields were filled out
    echo "Please fill in all required fields.";
}
?>