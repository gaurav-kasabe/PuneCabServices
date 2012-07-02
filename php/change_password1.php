<?php
session_start();

$user_name = $_SESSION['user_name'];
//echo $user_name;
$old_pass = $_POST['old_password'];
$old_pass =md5($old_pass);
$new_pass = $_POST['new_password'];
$new_pass = md5($new_pass);
//echo $new_pass;
//exit();
require_once '../configuration/mysql.php';
$query="UPDATE login SET password='$new_pass' WHERE username ='$user_name' AND password='$old_pass'";
//header('Location: ../admin.php');
if(!mysql_query($query))
{
	die('Error: ' . mysql_error());
}
echo "Required record updated!";
header('Location: admin.php');		
?>