

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

<?php
if($_SESSION['username']){
$url="http://localhost/internproblemstatement/welcome.php";
 echo "<a href=$url>"; 
 
 echo $_SESSION['username']; 
 echo "</a>";
 }
else {header("Refresh:0;URL=http://localhost/internproblemstatement/index.html");} 
?>
<form action="http://localhost/internproblemstatement/logout.php" method="post">
<button name="Logout" value="logout">Logout</button>
</form>
<?php
$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("select distinct sname from friends where fname='$s1'");
$i=1;
echo "<br>";
echo "<h1>FRIENDS<h1>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div>$i)";
	$ans=$row["sname"];
echo "$ans";
echo"<br>";
  $i=$i+1;
    }
echo"</div>";
	}
else {echo "<div>No friend requests</div>";}
?>

<form id="formleft" action="http://localhost/internproblemstatement/request.php" method="post">
<?php
$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("select distinct fname from request where sname='$s1'");
$i=1;
echo "<br>";
echo "FRIEND REQUESTS";
echo "<br>";
$aid=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div>$i)";
	$ans=$row["fname"];
echo "$ans";
echo"   <button name='accept' type='submit' value='$ans'>  accept ";
echo"   <button name='reject' type='submit' value='$ans'>   reject";
echo"</div>";
  $i=$i+1;
    }

	}

?>
</form>
<form id=formright action="http://localhost/internproblemstatement/addfriend.php" method="post">
<?php
$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("select distinct username from login where username not in(select sname from friends where fname='$s1')");
$i=1;
echo "<br>";
echo "OTHER PEOPLE";
echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div>$i)";
	$ans=$row["username"];
echo "$ans";
if($ans!=$s1)
{
echo"   <button name='addfriend' type='submit' value='$ans'> Add friend "; }
echo"<br>";
  $i=$i+1;
  if($i>20){break;}
echo"</div>";   
   }

	}

?>
</form>
<?php
$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");
$s1=$_SESSION['username'];
$result=$conn->query("select distinct sname from request where fname='$s1'");
$i=1;
echo "<br>";
echo "FRIEND REQUESTS SENT TO";
echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "<div>$i)";
	$ans=$row["sname"];
echo "$ans";
echo"</div>";
  $i=$i+1;
    }
	}
?>
	
	
</div>
</body>
</html>