<?php
session_start();
$username = $_POST['user_name'];
$password = $_POST['password'];
$password1 =md5($password);
//echo $password1;
//exit();
require_once '../configuration/mysql.php';

$query = "SELECT * FROM login WHERE username='$username' AND password='$password1'";
$result = mysql_query($query,$con)or die(mysql_error());
$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row >=1 ) {
			//echo 'true';
			$_SESSION['user_name']=$row['username'];
			header('Location: admin.php');

		}
		else{
			echo 'false';
			header('Location: ../index.php');
		}
		mysql_close($con);
?>
