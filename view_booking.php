
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

$statement = $connection->prepare("SELECT * FROM tickets WHERE passenger_name=? ");
$statement->execute(array($_SESSION['user_name']));
?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Trains <small>/ Between Station</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Trains Between Station</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                <div class="col-md-12 forminput">
			<table class="table tablebg">
					<tr>
						<th>PNR</th>
						<th>Train Number</th>
						<th>No. Of Seats</th>
						<th>Train Status</th>
						<th>Train Date</th>
						<th>Booked On</th>
					</tr>
					
<?php 
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach ($result as $row) { 

?>
					<tr>
						<td><?php echo $row['pnr'] ?></td>
						<td><?php echo $row['TrainNumber'] ?></td>
						<td><?php echo $row['no_of_seats'] ?></td>
						<td><?php echo $row['train_status'] ?></td>
						<td><?php echo date('d-m-y',strtotime($row['booking_date'])) ?></td>
						<td><?php echo date('d-m-y H:i:s',strtotime($row['booked_on'])) ?></td>
					</tr>
<?php } ?>
				</table></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php') ?>