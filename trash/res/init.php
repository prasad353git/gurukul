<?php
	$servername = "localhost";
	$username = "root";
	$password = "12345678";
	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,'srms');


?>