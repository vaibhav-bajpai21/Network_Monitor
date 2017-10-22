<?php
$DB_HOST= "localhost";
$DB_NAME ="login";
$DB_USER="root";
$DB_PASSWORD="cciitk";
$con=mysqli_connect("localhost","root","cciitk","login");
if (mysqli_connect_errno())
 {
    echo "failed to connect to MYSQL:" .mysqli_connect_errno();
  }

$db=mysqli_select_db($con,"login") or die ("Failed to connect to MySQL: " . mysqli_error($con));
session_start();

if(!empty($_POST['username']))   //checking the username, is it empty or have some text

{
   $query = mysqli_query($con,"SELECT *  FROM vaibhav where username = '$_POST[username]' && password = '$_POST[password]'") or die(mysqli_error($con));

	$row = mysqli_fetch_assoc($query)or die(mysqli_error($con));

	if($row['username']="cciitk" && $row['password']="cciitk")
	{

		echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
                exec('./scriptfile.sh');
                header ('refresh: 2, URL="display.php"');

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}

}
else {
echo "SORRY";
header('refresh: 0,URL="login.html"');
}

?>
