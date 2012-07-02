<?php
session_start();

$user_name = $_SESSION['user_name'];
//echo $user_name;
$packages_name = $_POST['packages_name'];
$packages_priority = $_POST['packages_priority'];
//echo $packages_priority;
//exit();
require_once '../configuration/mysql.php';
$query="UPDATE packages SET packages_priority='$packages_priority' WHERE packages_name='$packages_name'";
//header('Location: ../admin.php');
if(!mysql_query($query))
{
	die('Error: ' . mysql_error());
}
echo "Required record updated!";
header('Location: admin.php');		
?>