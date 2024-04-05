<?php
include "config.php";
$id = $_GET['ID'];
mysqli_query($con, "DELETE FROM `todoconsultants` WHERE Id = $id");
header("location:consultantsHP.php");
?>