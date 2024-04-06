
<?php
session_start();
require 'db.php'; // Ensure you have included the database connection
// if (!isset($_SESSION['email'])) {
//     // If the user is not logged in, redirect to the login page.
//     header('Location: index.php');
//     exit();
// }
// Check if the form data is set
if (isset($_POST['Group_User'], $_POST['Task'], $_POST['CompletionDate'])) {
    $groupUser = $_POST['Group_User']; // Updated field name
    $task = $_POST['Task'];
    $completionDate = $_POST['CompletionDate'];
    $taskStatus = 'Pending';
    // Prepare an INSERT statement to insert the task into the database
    $query = "INSERT INTO SkillDevTask (Group_User, Task, CompletionDate, TaskStatus) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $groupUser, $task, $completionDate, $taskStatus);
    if ($stmt->execute()) {
        // Update was successful
        $_SESSION['email'] = $newEmail; // Update the email in the session if it was changed
        header('Location: trainerManagement.html'); // Redirect with a success message
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Not all form fields were filled out
    echo "Please fill in all required fields.";
}
?>
