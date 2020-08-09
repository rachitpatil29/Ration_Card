  <?php
include_once 'logincheck.php';
if($_GET){
  $username = $_GET['username'];
}
$conn = mysqli_connect("localhost", "root", "", "hackathon");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM newcitizen where rid='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title> Register Forms </title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                   <u> <h2 class="title">HELLO <?php echo $row['nameofhead']; ?>!! YOUR PROFILE PAGE</h2></u>
                    <form action="profile.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ration Card ID</label>
                                   <label class="label">
                                     <?php
                                     echo $row['rid'];
                                     ?>
                                   </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Full name*</label>
                                    <label for="">
                                      <?php
                                        echo $row['nameofhead']." ".$row['lastname'];
                                      ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of birth*</label>
                                    <div class="input-group-icon">
                                        <label for="">
                                          <?php
                                            echo $row['dateofbirth'];
                                          ?>
                                        </label>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
							<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Registration*</label>
                                    <div class="input-group-icon">
                                      <label for="">
                                        <?php
                                          echo $row['dateofregistration'];
                                        ?>
                                      </label>
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender*</label>
                                    <div class="p-t-10">
                                      <label for="">
                                        <?php
                                          if($row['gender']=='m'){
                                            echo "MALE";
                                          }else{
                                            echo "FEMALE";
                                          } ;
                                        ?>
                                      </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address*</label>
                                    <label for="">
                                      <?php
                                        echo $row['address'];
                                      ?>
                                    </label>
                                </div>
                            </div>
							<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Shop address*</label>
                                    <label for="">
                                      <?php
                                        echo $row['shopaddress'];
                                      ?>
                                    </label>
                                </div>
                            </div>
							<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Shop no*</label>
                                    <label for="">
                                      <?php
                                        echo $row['shopno'];
                                      ?>
                                    </label>
                                </div>
                            </div>
							<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Counter no*</label>
                                    <label for="">
                                      <?php
                                        echo $row['counterno'];
                                      ?>
                                    </label>
                                </div>
                            </div>
							<div class="col-2">
                                <div class="input-group">
                                    <label class="label">Time slot*</label>
                                    <label for="">
                                      <?php
                                        echo $row['timeslot'];
                                      ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number*</label>
                                    <label for="">
                                      <?php
                                        echo $row['phonenumber'];
                                      ?>
                                    </label>
                                </div>
                            </div>

							<div class="col-2">
                                <div class="input-group">
                                    <label class="label"> Number of family member*</label>
                                    <label for="">
                                      <?php
                                        echo $row['nooffamilymem'];
                                      ?>
                                    </label>
                                </div>
                            </div>
							 <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Aadhaar card number*</label>
                                    <label for="">
                                      <?php
                                        echo $row['aadharcardno'];
                                      ?>
                                    </label>
                                </div>
                            </div
                        </div>
                        <div class="input-group">
                            <label class="label">Income per annum*</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                              <label for="">
                                <?php
                                  echo $row['incomeperannum'];
                                ?>
                              </label>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Last date when received Ration</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                              <label for="">
                                <?php
                                  echo $row['dateofsend'];
                                ?>
                              </label>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<div class="">
  <a href="logout.php"><input type="submit" id="btn" value="Logout" style="background:none;height:150px;"></a>
</div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
