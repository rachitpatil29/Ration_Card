<?php

session_start();


$con = mysqli_connect('localhost','root', '', 'hackathon');
if($con){
	echo" connection successful";
}else{
	echo " no connection";
}

mysqli_select_db($con, 'hackathon');

$name=$_POST['name'];
$userid=$_POST['userid'];
$dateofincident=$_POST['dateofincident'];
$dateofcomplaintregistration=$_POST['dateofcomplaintregistration'];
$complaint=$_POST['complaint'];

$q = " select * from complaint  where name = '$name' && userid = '$userid' && dateofincident = '$dateofincident' && dateofcomplaintregistration = '$dateofcomplaintregistration' && complaint = '$complaint'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" duplicate data ";
}
else{

	$qy= "INSERT INTO complaint (name,userid,dateofincident,dateofcomplaintregistration,complaint) VALUES ('$name','$userid','$dateofincident','$dateofcomplaintregistration','$complaint')";
	mysqli_query($con, $qy);

}
header('location:complaint.html');
?>