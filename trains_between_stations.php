
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
                                    <div id="login-box" class="col-md-12">
                                        <?php
                                        function test_input($data) {
                                            $data = trim($data);
                                            $data = stripslashes($data);
                                            $data = htmlspecialchars($data);
                                            return $data;
                                        }
                                                                                
                                        if(isset($_POST['submit']))
                                        { 
                                            $source_stn=test_input($_POST['source_stn']);
                                            $destination_stn=test_input($_POST['destination_stn']);	
                                                


                                            $statement = $connection->prepare("SELECT * FROM trains WHERE Start=? AND End=? ");
                                            $statement->execute(array($source_stn , $destination_stn));


                                        ?>
                                                    <div class="col-md-12 forminput">
                                                    <table class="table tablebg">
                                                            <tr>
                                                                <th>Train Number</th>
                                                                <th>Train Name</th>
                                                                <th>Train Type</th>
                                                                <th>Source Station</th>
                                                                <th>Destination Station</th>
                                                            </tr>
                                                            
                                        <?php 
                                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($result as $row) { 

                                        ?>
                                                            <tr>
                                                                <td><?php echo $row['TrainNumber'] ?></td>
                                                                <td><?php echo $row['TrainName'] ?></td>
                                                                <td><?php echo $row['Category'] ?></td>
                                                                <td><?php echo $row['Start'] ?></td>
                                                                <td><?php echo $row['End'] ?></td>
                                                            </tr>
                                        <?php } ?>
                                                        </table>
                                                        
                                        <?php 
                                            } else {
                                                ?>
                                        <form id="login-form" class="form" action="" method="post">
                                            <?php
                                                echo $err; ?>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Source Station:</label><br>
                                                <select name="source_stn" type="text" class="form-control" required>
                                                    <option>Select Station....</option>
                                                    <?php
                                                    $statement = $connection->prepare("SELECT DISTINCT Start FROM  trains");
                                                    $statement->execute(array());
                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        ?>
                                                        <option value="<?php echo $row['Start']; ?>"><?php echo $row['Start']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Destination Station:</label><br>
                                                <select name="destination_stn" type="text" class="form-control" required>
                                                    <option>Select Station....</option>
                                                    <?php
                                                    $statement = $connection->prepare("SELECT DISTINCT End FROM  trains");
                                                    $statement->execute(array());
                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                        ?>
                                                        <option value="<?php echo $row['End']; ?>"><?php echo $row['End']; ?></option>
                                                    <?php
                                                     } ?>
                                                </select>
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
                                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                                <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                            </div>
                                        </form>
                                        <?php
    } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php') ?>