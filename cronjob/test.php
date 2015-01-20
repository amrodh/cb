<?php 
	

	$con = mysqli_connect("localhost","root","root","testme");
	
	$sqlInsertCron = "INSERT INTO cron (name) values ('cron')";
    $result = $con->query($sqlInsertCron);

 ?>