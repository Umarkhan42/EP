function validateForm() {
    var groupUser = document.getElementById("Group_User").value;
    var task = document.getElementById("Task").value;
    var completionDate = document.getElementById("CompletionDate").value;
    if (groupUser.trim() === "" || task.trim() === "" || completionDate.trim() === "") {
        alert("Please fill in all required fields.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}