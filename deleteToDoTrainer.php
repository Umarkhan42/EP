<?php
include "config.php";
$id = $_GET['ID'];
mysqli_query($con, "DELETE FROM `todotrainer` WHERE Id = $id");
header("location:trainerHP.php");
?>