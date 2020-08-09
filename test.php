  <?php
include_once 'registration.php';

if($_GET){
  $phonenumber = $_GET['phonenumber'];
}

if(isset($_POST['submit'])){
	$place=$_POST['place'];
	$message=$_POST['message'];
  $conn = mysqli_connect("localhost", "root", "", "hackathon");
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

  // $place = $_POST['place'];

  $sql = "SELECT mobile FROM tryfetch where place='$place'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
        $mobile = '91'.$row["mobile"];
        $numbers =  array($mobile);

        $apiKey = urlencode('t2HjDAdkXX4-K7OjqPGd1mYpwWNdp3xoBmDH8sahJr');
        $sender = urlencode('TXTLCL');
        $message = rawurlencode($message);
        $numbers = implode(',', $numbers);
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    }
  } else {
    echo "0 results";
  }

  $conn->close();
	//echo $response;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP SMS Blast</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">SMS form</h2>
  <form class="form-horizontal" method="post" action="test.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="mobile">Enter place</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter place" name="place">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="message">Message:</label>
      <div class="col-sm-10">
        <textarea name="message" class="form-control" placeholder="Enter message"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
