

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link type="text/css" rel="stylesheet" href="flames.css" />
<head>
<link type="text/css" rel="stylesheet" href="flames.css" />
<title></title>
</head>
<body>
<?php
session_start();
$status=$_POST['status'];

$conn=new mysqli("mysql12.000webhost.com","a1703319_swapnil","elnino9");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("insert into status values('$s1','$status')");
header("Refresh:0;URL=http://www.swapnildarmora.comlu.com/welcome.php");

?>
</body>
</html>