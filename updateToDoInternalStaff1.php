<?php
include "config.php";
$List = $_POST['list'];
$ID = $_POST['id'];
mysqli_query($con, "UPDATE `todointernalstaff` SET `list`='$List' WHERE Id=$ID");
header("location:internalStaffHP.php");
?>