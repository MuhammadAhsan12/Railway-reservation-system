
<?php
  require_once('inc/top.php');
  require_once('db/login.php');

  if(!isset($_SESSION['user_id'])){
      header('Location: loginform.php');
      exit;
  } else {
      $id = $_SESSION['user_id'];
      $name = $_SESSION['user_name'];
      $cnic = $_SESSION['user_cnic'];
      $phone = $_SESSION['user_phone'];
      $email = $_SESSION['user_email'];
      $station = $_SESSION['user_station'];
  }

  function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

  if(isset($_POST['submit']))
{

    $pname=test_input($_POST['pname']);
    $date=test_input($_POST['date']);
    $seat_no=test_input($_POST['seat_no']);
    $train_no=test_input($_POST['TrainNumber']);
} 

?>
        <script>
			function validate_from()
			{
				var x=document.forms["adform"]["pname"].value;
				if(x==null || x=="")
				{
					alert("Enter your name");
					return false;
				}
				x=document.forms["adform"]["date"].value;
				if(x==null || x=="")
				{
					alert("Enter date");
					return false;
				}
				x=document.forms["adform"]["seat_no"].value;
				if(x==null || x=="")
				{
					alert("Enter seat_no no.");
					return false;
				}
				x=document.forms["adform"]["TrainNumber"].value;
				if(x==null || x=="")
				{
					alert("Enter TrainNumber no.");
					return false;
				}
				
			}
		</script>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Booking <small>/ Booked now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Booking now</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login" class="col-md-12">
                                        <form id="login-form" class="form" action="tickets.php" method="post" name="adform" onsubmit="return validate_from()">
                                            <div class="form-group">
                                                <label for="username" class="text-info">Passenger Name:</label><br>
                                                <input placeholder="Name" name="pname" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Train Date:</label><br>
                                                <input type="date" class="form-control" <?php if(!empty($_POST['availdate'])){ ?> value="<?=$_POST['availdate']?>" <?php } ?> name="date"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Number of seats:</label><br>
                                                <input type="text" class="form-control" placeholder="Number of seat_no" name="seat_no" require>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Select Train Name:</label><br>
                                                <select name="TrainNumber" type="text" class="form-control" required>
                                                <?php if(!empty($_POST['availdate'] && $_POST['trainno'])){ ?> <option value="<?php $_POST['trainno']?>"><?php $_POST['trainname']?> <?php } else { ?>
                                                <option class="form-control">Select train Name ....</option>
                                                <?php
                                                $statement = $connection->prepare("SELECT * FROM  trains");
                                                $statement->execute(array());
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        ?>
                                                    <option value="<?php echo $row['TrainNumber']?>"><?php echo $row['TrainName']; ?></option>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </select>
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
                                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                                <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php') ?>