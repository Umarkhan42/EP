<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="timeoff.css">
    <link rel="stylesheet" type="text/css" href="global.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <title>About me</title>
</head>
<body>
    <div class="container">

        <aside>
            
            <a href="updateinfo.php">
                <div class="icons-wrapper">
                    <img 
                    class="" 
                    loading="lazy" 
                    alt="" 
                    src="./public/icons.svg" />
                </div>
            </a>


    
    
            <div class="frame-container">
                <img
                class=""
                loading="lazy"
                alt=""
                src="./public/group-32.svg"
                />
            </div>
    
            <a href="employeeManagement.php">
                <div class="image-8-wrapper">
                    <img
                    class="image-8-icon"
                    loading="lazy"
                    alt=""
                    src="./public/image-8@2x.png"
                    />
                </div>
            </a>
            
            <a href="internalStaffHP.php">
                <div>
                    <img src="./public/home.png" alt="">            
                </div>
            </a>
              
              
        </aside>

        <header> 
            
            
            <img class="fdm-logo" src="./public/fdmlogoblack-2@2x.png" alt="">

        </header>

        <div class="container1">
            <h2>Employee Leave Request</h2>
            <form action="employee.php" method="post">
                <div class="form-group">
                    <label for="employee_name">Employee Name:</label>
                    <input type="text" id="employee_name" name="employee_name" required>
                </div>
                <div class="form-group">
                    <label for="leave_type">Leave Type:</label>
                    <select id="leave_type" name="leave_type" required>
                        <option value="annual_leave">Annual Leave</option>
                        <option value="sick_leave">Sick Leave</option>
                        <option value="unpaid_leave">Unpaid Leave</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea id="reason" name="reason" rows="4" required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        
    </div>
</body>
</html>