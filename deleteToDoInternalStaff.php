<?php
include "config.php";
$id = $_GET['ID'];
mysqli_query($con, "DELETE FROM `todointernalstaff` WHERE Id = $id");
header("location:internalStaffHP.php");
?>