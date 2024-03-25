document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the form from submitting normally
    
    // Retrieve input values
    var usernameOrEmail = document.getElementById("username-email").value;
    var password = document.getElementById("password").value;

    // Load JSON data
    fetch("employees.json")
    .then(response => response.json())
    .then(data => {
        // Check if username/email and password match
        var employee = data.employees.find(e => (e.name === usernameOrEmail || e.email === usernameOrEmail) && e.password === password);
        if (employee) {
            // Login successful, redirect based on role
            switch (employee.role) {
                case "Trainer":
                    window.location.href = "trainerHP.html";
                    break;
                case "Consultant":
                    window.location.href = "consultantsHP.html";
                    break;
                case "Internal Staff":
                    window.location.href = "internalStaffHP.html";
                    break;
                default:
                    alert("Invalid role!");
            }
        } else {
            // Login failed, display error message
            alert("Invalid username/email or password.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});