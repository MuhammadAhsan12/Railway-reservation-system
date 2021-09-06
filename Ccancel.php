
<?php
  require_once('inc/top.php');
  require_once('db/login.php');

  if (isset($_POST['submit'])) {
      $pnr=$_POST['pnr'];


      $statement = $connection->prepare("SELECT TrainNumber,booking_date,no_of_seats FROM tickets WHERE pnr = ?");
      $statement->execute(array($pnr));
      $result = $statement->fetch(PDO::FETCH_ASSOC);
      if (!empty($result)) {
          $statement1 = $connection->prepare("UPDATE train_status SET available_seat=available_seat + ?,booked_seats=booked_seats - ? WHERE TrainNumber=? AND available_Date = ?");
          $statement1->execute(array($result['no_of_seats'],$result['no_of_seats'],$result['TrainNumber'],$result['booking_date']));
          $statement = $connection->prepare("DELETE FROM tickets WHERE pnr=?");
          $statement->execute(array($pnr)); ?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Cancil <small>/ Ticket now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Cancel Ticket Now</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                    <div align="center" class="col-md-3">
                                    <table class="table tablebg">
                                        <tr>
                                            <td>Your Requested is completed </td>
                                        </tr>
                                        <tr>
                                            <td>Your have cancelled the seat.</td>
                                        </tr>
                                    </table>
                                    </div>

                                    </div>]
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
      }else{
          ?>
          </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Cancil <small>/ Ticket now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Cancel Ticket Now</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                    <div align="center" class="col-md-3">
                                    <table class="table tablebg">
                                        <tr>
                                            <td>You entered an invalid PNR </td>
                                        </tr>
                                        <tr>
                                            <td>Unable to Cancel.</td>
                                        </tr>
                                    </table>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <?php
      }
  }
        ?>
        <?php require_once('inc/footer.php') ?>