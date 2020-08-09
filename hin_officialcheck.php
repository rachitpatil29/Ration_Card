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

	$username = $_POST['id'];
	$password = $_POST['password'];

	$sql = "select * from official where id='$username' and password='$password'";

	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);

		if($row == 1){
			echo "login successful";
			$_SESSION['id'] = $username;
			header('location:hin_register.html');
		}else{
				echo "login failed";
				header('location:hin_login.html');
			}


}

?>
