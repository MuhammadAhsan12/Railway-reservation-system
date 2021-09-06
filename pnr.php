
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
    
    if(isset($_POST['submit']))
    {
        $pnr=$_POST['pnr'];
        $statement = $connection->prepare("SELECT * FROM tickets WHERE pnr = ?");
        $statement->execute(array($pnr));
        $result = $statement->fetch()['TrainNumber'];
        $train_id = $result;
        if(empty($result))
        {
            
            ?> 

                    <div class="col-md-3">
                    <table class="table tablebg">
                        <tr>
                            <td>Invalid PNR Number.</td>
                        </tr>
                    </table>
                    </div>

                    <?php
        }
        else
        {
            $msg="ok";
        }
    }
?>
  </head>
  <body>
    <div id="wrapper">
    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Login In <small>/ Login now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Login In</li>
                    </ol>
                    <div id="login">
                    <br><br><br>
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                        <form id="login-form" class="form" action="" method="post" name="signin-form">
                                            <div class="form-group">
                                                <label for="username" class="text-info">PNR no:</label><br>
                                                <input type="text" placeholder="PNR" name="pnr" class="form-control" required>    
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
					                            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                                            </div>
                                        </form>
                                        <br><br>
                                        <?php
                                        if(isset($msg))
                                        {

                                        
                                        ?>		
                                        
                                        <table class="table tablebg">
                                            <tr>
                                                <td><center>Status of your tickets ..</center></td>
                                            </tr>
                                        </table>
                                        
                                        <table class="table tablebg">

                                        <tr>
                                            <td>PNR </td>
                                            <td>Passenger Name </td>
                                            <td>Source </td>
                                            <td>Destination </td>
                                            <td>Train</td>
                                            <td>No of Seat</td>
                                            <td>Status</td>
                                        </tr>

                                        <?php 
                                            $statement = $connection->prepare("SELECT * FROM trains WHERE TrainNumber = ?");
                                            $statement->execute(array($train_id));
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $row) {
                                                }

                                            $statement1 = $connection->prepare("SELECT * FROM tickets WHERE pnr = ?");
                                            $statement1->execute(array($pnr));
                                            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result1 as $row1) {
                                            }

                                        ?>
                                        
                                        
                                        <tr>
                                            <td><?php echo $pnr;?></td>
                                            <td><?php echo $row1['passenger_name'];?></td>
                                            <td><?php echo $row['Start'];?></td>
                                            <td><?php echo $row['End'];?></td>
                                            <td><?php echo $row['TrainName'];?></td>
                                            <td><?php echo $row1['no_of_seats']?></td>
                                            <td><?php echo $row1['train_status']?></td>
                                        </tr>
                                        </table>
                                        <?php
                                                
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