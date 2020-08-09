<?php

session_start();


$con = mysqli_connect('localhost','root');
if($con){
	echo" connection successful";
}else{
	echo " no connection";
}

mysqli_select_db($con, 'hackathon');

$rid=$_POST['rid'];
$pass=$_POST['pass'];
$nameofhead=$_POST['nameofhead'];
$lastname=$_POST['lastname'];
$dateofbirth=$_POST['dateofbirth'];
$dateofregistration=$_POST['dateofregistration'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$shopaddress=$_POST['shopaddress'];
$shopno=$_POST['shopno'];
$counterno=$_POST['counterno'];
$timeslot=$_POST['timeslot'];
$phonenumber=$_POST['phonenumber'];
$nooffamilymem=$_POST['nooffamilymem'];
$aadharcardno=$_POST['aadharcardno'];
$incomeperannum=$_POST['incomeperannum'];



$q = " select * from newcitizen  where rid='$rid' && pass='$pass' && nameofhead = '$nameofhead' && lastname = '$lastname' && dateofbirth = '$dateofbirth' && dateofregistration = '$dateofregistration' &&
gender = '$gender' && address = '$address' && shopaddress = '$shopaddress' && shopno = '$shopno' && counterno = '$counterno' && timeslot = '$timeslot' &&
phonenumber = '$phonenumber' && nooffamilymem = '$nooffamilymem' && aadharcardno = '$aadharcardno' && incomeperannum = '$incomeperannum'";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if($num == 1){
	echo" duplicate data ";
}
else{

	$qy= "INSERT INTO newcitizen (rid,pass,nameofhead, lastname, dateofbirth, dateofregistration, gender, address, shopaddress, shopno, counterno, timeslot, phonenumber, nooffamilymem, aadharcardno, incomeperannum) VALUES ('$rid','$pass','$nameofhead','$lastname','$dateofbirth','$dateofregistration','$gender','$address','$shopaddress','$shopno','$counterno','$timeslot','$phonenumber','$nooffamilymem','$aadharcardno','$incomeperannum')";;
	mysqli_query($con, $qy);

}
header("location:http://localhost/hackstomp/apnaadhikarfinal/web/PHPSMSAPItrial/test.php?phonenumber=".$phonenumber);



?>
