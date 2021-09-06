
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

  if (isset($_POST['submit'])) {
      $pname=$_POST['pname'];
      $seat_no=$_POST['seat_no'];
      $date=$_POST['date'];
      $date = date($date);
      $bookdate=date('Y-m-d H:i:s', strtotime('today IST'));
      $train_no=$_POST['TrainNumber'];
      $train_status = 'confirm';


      $statement = $connection->prepare("SELECT * FROM train_status WHERE TrainNumber = ?");
      $statement->execute(array($train_no));
      $result = $statement->fetch()['available_seat'];

      if ($result > $seat_no) {
          $result = $result - $seat_no ;
          $random=str_shuffle("012345678915975369740582198745632109632587410756489156324");
          $pnr=substr($random, 0, 6);


          $statement = $connection->prepare("UPDATE train_status SET available_seat=?,booked_seats=? WHERE TrainNumber=? AND available_Date = ?");
          $statement->execute(array($result,$seat_no,$train_no,$date));


          $statement = $connection->prepare("INSERT INTO tickets (pnr,passenger_name,TrainNumber,no_of_seats,train_status,booking_date,booked_on) VALUES (?,?,?,?,?,?,?)");
          $statement->execute(array($pnr,$pname,$train_no,$seat_no,$train_status,$date,$bookdate)); ?>
  </head>
  <body>
    <div id="wrapper">
    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Ticket <small>/ status</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Ticket status</li>
                    </ol>
                    <div id="login">
                    <br><br><br>
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                <div align="center" class="col-md-3">
                                <table class="table tablebg">
                                    <tr>
                                        <td>Your Requested is completed </td>
                                    </tr>
                                    <tr>
                                        <td>You have booked : <?php echo $seat_no ; ?> seats.</td>
                                    </tr>
                                    <tr>
                                        <td>Your PNR is : <?php echo $pnr ; ?></td>
                                    </tr>
                                </table>
                                </div>
                                <?php
      } else {
          ?>
                                <div align="center" class="col-md-5">
                                    <table class="table tablebg">
                                        <tr>
                                            <td>Unable to book Desired Number of seats</td>
                                        </tr>
                                        <tr>
                                            <td>Available Seats : <?php echo $result ; ?> seats.</td>
                                        </tr>
                                    </table>
                                </div>
                                <?php
            }
        }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php') ?>