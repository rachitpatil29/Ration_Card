<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con){
	echo" connection successful";
}else{
	echo " no connection";
}

mysqli_select_db($con, 'hackathon');

$experience=$_POST['experience'];
$comments=$_POST['comments'];
$name=$_POST['name'];


$q = " select * from feedback  where experience = '$experience' && comments = '$comments' && name = '$name' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" duplicate data ";
}
else{

	$qy= "INSERT INTO feedback (experience,comments,name) VALUES ('$experience','$comments','$name')";
	mysqli_query($con, $qy);

}
header('location:formpage.html');
