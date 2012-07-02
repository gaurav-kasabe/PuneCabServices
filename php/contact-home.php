<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Contact Form</title>
</head>

<body>
<?php 
$cstname=$_POST['cstname'];
$cstno=$_POST['cstno'];
$cfrom=$_POST['cfrom'];
$cto=$_POST['cto'];
$cdate=$_POST['cdate'];
$cpreference=$_POST['cpreference'];
$flag=$_POST['flag'];
echo "customer query= ".$cstname." "." ".$cstno." "." ".$cfrom." "." ".$cto." "." ".$cdate." "." "." "." ".$cpreference." ".$flag;
sleep(2);
header("location:../index.html");
?>
</body>
</html>
