

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


$conn=new mysqli("mysql12.000webhost.com","a1703319_swapnil","elnino9");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
if(isset($_POST['accept']))
{
echo $_POST['accept'];

$s2= $_POST['accept'];
$conn->query("insert into friends values('$s2','$s1')");
$conn->query("insert into friends values('$s1','$s2')");
$conn->query("delete from request where fname='$s2' AND sname='$s1'");
header("Refresh:0;URL=http://www.swapnildarmora.comlu.com/friends.php");
}
elseif(isset($_POST['reject']))
{
$s2= $_POST['reject'];
$conn->query("delete from request where fname='$s2' AND sname='$s1'");
header("Refresh:0;URL=http://www.swapnildarmora.comlu.com/friends.php");
}
?>
</body>
</html>