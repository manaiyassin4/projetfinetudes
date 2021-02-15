<?php 
	// get values passe from form in login.php file

$servername= "localhost";
$dbusername= "root";
$dbpassword= "";
$dbname="steg";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if (!$conn){
	die("connection failed ". mysqli_connect_error());
}

?>