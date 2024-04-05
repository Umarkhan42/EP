<?php
$LIST = $_POST['list'];
include "config.php";
mysqli_query($con, "INSERT INTO `todointernalstaff`(`list`) VALUES ('$LIST')");
header("location:internalStaffHP.php");
?>