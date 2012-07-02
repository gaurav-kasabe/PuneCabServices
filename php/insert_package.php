<?php
session_start();

$user_name = $_SESSION['user_name'];
//echo $user_name;
$packages_name = $_POST['packages_name'];
$packages_name = mysql_real_escape_string($packages_name);
$packages_disc = $_POST['packages_disc'];
$packages_disc = mysql_real_escape_string($packages_disc);
$packages_priority = $_POST['packages_priority'];
$packages_priority = mysql_real_escape_string($packages_priority);
//echo $packages_priority;
//exit();
require_once '../configuration/mysql.php';
$query="INSERT INTO packages(packages_name,packages_disc,packages_priority)values('$packages_name','$packages_disc','$packages_priority')";
if(!mysql_query($query))
{
  die('Error: ' . mysql_error());
}
echo "1 record inserted in table!";
header('Location: admin.php');		
?>