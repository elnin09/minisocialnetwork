
<html>
<link type="text/css" rel="stylesheet" href="flames.css" />
<head>
<link type="text/css" rel="stylesheet" href="flames.css" />
<title></title>
</head>

<body>


<?php

if(isset($_POST['login'])) {
$name=$_POST['username'];
$pass=$_POST['password'];
session_start(); 

$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");
$result=$conn->query("select * from login where username='$name' AND password='$pass'");
$row=$result->fetch_assoc();
if($row)
{session_start();
$_SESSION['username'] = $_POST['username'];
header("Refresh:0;URL=http://localhost/internproblemstatement/welcome.php");
}
else {echo "Sorry incorrect username or password" ;}
}

else if(isset($_POST['register']) ){ 
$conn=new mysqli("localhost","root","");
$conn->query("use a1703319_swapnil");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
 



$name=$_POST['username'];
$pass=$_POST['password'];

 $sql = "insert into login values('$name','$pass')";
 if ($conn->query($sql) === TRUE) {echo "Registerd successfully";
 header("Refresh:4;URL=http://localhost/internproblemstatement/index.html");
    } 
    else {
    echo "Registration error.Try again with valid username" . $conn->error;
}
 }

?>
</body>
</html>