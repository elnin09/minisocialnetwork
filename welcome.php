

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
?>
<h1>
<?php
if($_SESSION['username']){
$url="welcome.php";
 echo "<a href=$url>"; 
 
 echo $_SESSION['username']; 
 echo "</a>";}
else {header("Refresh:0;index.html");} 
?>
<form action="friends.php" method="post">
<button name="friends" value="Friend">Friend </button> 
</form>

<form action="logout.php" method="post">
<button name="Logout" value="logout">Logout</button>
</form>
</h1>
<div>
STATUS UPDATE
<form action="status.php" method="post">
<input type="textarea" name="status">
<button name="Logout" value="logout">POST</button>
</form>
</div>
<div>
STATUS FEED <br><br>
<?php
$conn=new mysqli("mysql12.000webhost.com","a1703319_swapnil","elnino9");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("select distinct username,text from status s,friends f where fname='$s1' AND f.sname=s.username");
$i=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "$i)";
	$ans=$row["text"];
$friend=$row["username"];
echo "$friend";
echo "<br>";
echo "$ans";
echo"<br>";
  $i=$i+1;
    }
}

?>
</div>
</body>
</html>