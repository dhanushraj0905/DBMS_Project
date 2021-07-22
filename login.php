<html>

<?php
session_start();

$pid= $_POST['pid'];
$password = $_POST['password'];


$pid=stripcslashes($pid);
$password=stripcslashes($password);


$con = mysqli_connect("localhost","root","","crimerecord");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$sql="select * from policelog where pid='$pid' and password='$password'" or die();
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result,MYSQLI_NUM);
if($row[0]==$pid && $row[1]==$password)
{
	$_SESSION["logged_in"] = TRUE;
	header("location:index.php");
}
else
{
	$_SESSION[logged_in] = FALSE;
	?>
	alert("invalid credentials");
	<?php
	header("location:login.html");
}

mysqli_free_result($result);

mysqli_close($con);
?>
</html>