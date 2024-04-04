
<?php
session_start();
include 'db.php'; // Include your database connection script
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cssFolder/reset.css">
    <link rel="stylesheet" type="text/css" href="cssFolder/employeeManagementt.css">
    <link rel="stylesheet" type="text/css" href="global.css">
    <title>Document</title>
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
    
    
            
            <a href="timeoff.php">
                <div class="g1970-parent">
                    <img
                    class=""
                    loading="lazy"
                    alt=""
                    src="./public/g1970.svg"
                    />
                </div>
            </a>

            <a href="internalStaffHP.php">
                <div>
                    <img src="./public/home.png" alt="">            
                </div>
            </a>


            
        </aside>


        <section class="current">

            <div class="parent">
            <h3>Approve Annual leave</h3>

                <div class="approve-content">
                <?php
                    $sql = "SELECT * FROM request";
                    $valid = mysqli_query($conn, $sql);
                    $index = 1; // Start with an index for paragraph IDs
                    if (mysqli_num_rows($valid) > 0){
                        while ($found = mysqli_fetch_assoc($valid)) {
                            $paragraphId = "paragraph" . $index; // Generate unique paragraph ID
                            echo "<br>";
                            echo "<p id='$paragraphId'>" . $found["name"] . "<br>". $found["reason"] . "<br>" . $found["type"]. "<br>". $found["start"] ."<br>".  $found["end"] . "</p>";
                            echo "<button onclick='hideParagraphAndButton(\"$paragraphId\", this)'>Hide Paragraph</button>"; // Use unique paragraph ID
                            $index++; // Increment index for next paragraph

                        }
                    }
                ?>



                </div>
            </div>



            <div class="gap"></div>

            <div class="addAnnouncement">
                <form id="announcementForm" action="addAnnouncement.php" method="post">
                    <h3>Add Announcement</h3>

                    <input type="text" id="announcementTitle" name="announcementTitle" placeholder="Enter announcement title" required>

                    <textarea id="announcementText" name="announcementText" placeholder="Enter announcement" required></textarea><br><br>

                    <input type="submit" value="Add Announcement">
                </form>
            </div>

        </section>
    

        <section class="update">
            <form id="updateForm" action="addNew.php" method="post">
                <h3>Add employee</h3>

                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" placeholder="Enter name" required><br><br>
                
                <label for="dob">Date of Birth:</label><br>
                <input type="date" id="dob" name="dob" required><br><br>
                
                <label for="address">Address:</label><br>
                <input type="text" name="address" placeholder="Enter address" required></input><br><br>

                <label for="postcode">postcode:</label><br>
                <input type="text" name="postcode" placeholder="Enter postcode" required></input><br><br>
                
                <label for="phone">Phone Number:</label><br>
                <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required><br><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter email" required><br><br>
                
                <label for="role">Role:</label><br>
                <input type="text" id="role" name="role" placeholder="Enter role" required><br><br>

                <label for="password">Password:</label><br>
                <input type="text" id="password" name="password" placeholder="Enter password" required><br><br>
                
                <input type="submit" value="Save Changes">
            </form>
            
        </section>

        <div class="blank2"></div>

    </div>
<script>
    function hideParagraphAndButton(paragraphId, button) {
        var paragraph = document.getElementById(paragraphId);
        if (paragraph) {
            paragraph.style.display = "none";
        }
        if (button) {
            button.style.display = "none";
        }
    }
</script>
</body>

</html>