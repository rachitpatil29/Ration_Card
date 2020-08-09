<?php
session_start();
$con = mysqli_connect('localhost','root');
if($con){

	echo "connection successful !!!!";

}else{

	echo "no connection";
}

$db = mysqli_select_db($con,'hackathon');

if(isset($_POST['submit'])){

	$username = $_POST['rid'];
	$password = $_POST['pass'];

	$sql = "select * from newcitizen where rid='$username' and pass='$password'";

	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);

		if($row == 1){
			echo "login successful";
			$_SESSION['rid'] = $username;

			header("location:http://localhost/old/apnaadhikarfinal/web/profilepage.php?username=".$username);

		}else{
				echo "login failed";
				header('location:hin_login.html');
			}


}

?>
