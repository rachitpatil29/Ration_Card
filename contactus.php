<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con){
	echo" connection successful";
	header("location:mail.html");
}else{
	echo " no connection";
}

mysqli_select_db($con, 'hackathon');

$name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$q = " select * from contactus  where name = '$name' && email = '$email' && telephone = '$telephone' && subject = '$subject' && message = '$message'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" duplicate data ";
}
else{

	$qy= "INSERT INTO contactus (name,email,telephone,subject,message) VALUES ('$name', '$email', '$telephone', '$subject', '$message')";
	mysqli_query($con, $qy);

}
