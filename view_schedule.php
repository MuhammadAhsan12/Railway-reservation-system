<?php

require_once('./inc/top.php');

    $flag=1;$flag1=1;
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if (isset($_POST['submit1'])) {
    $startdate=date('Y-m-d', strtotime($_POST['startdate']));
    $enddate=date('Y-m-d', strtotime($_POST['enddate']));
    $source_stn=test_input($_POST['source_stn']);
    $destination_stn=test_input($_POST['destination_stn']);
    $statement = $connection->prepare("SELECT trains.TrainNumber,trains.TrainName,trains.Category,train_status.available_seat,train_status.available_Date FROM trains,train_status WHERE Start=? AND End=? AND trains.TrainNumber IN (SELECT TrainNumber FROM train_status where available_Date between ? and ? ) AND trains.TrainNumber=train_status.TrainNumber");
    $statement->execute(array($source_stn , $destination_stn, $startdate, $enddate));
    $flag1=0; ?>
    </head>
  <body>
    <div id="wrapper">

        <?php require_once('inc/header.php') ?>
        
        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> View <small>/ Schedule</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> View Schedule</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="view" class="col-md-12">
                            <div class="col-md-12 forminput">
                                        <table class="table tablebg">
                                            <tr>
                                                <th>Train Number</th>
                                                <th>Train Name</th>
                                                <th>Category</th>
                                                <th>Available Seats</th>
                                                <th>Available Date</th>
                                                <th>Booking</th>
                                            </tr>
                                            <?php
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                ?>
                                            <tr>
                                                <td><?php echo $row['TrainNumber'] ?> </td>
                                                <td><?php echo $row['TrainName'] ?> </td>
                                                <td><?php echo $row['Category'] ?> </td>
                                                <td><?php echo $row['available_seat']?></td>
                                                <td><?php echo $row['available_Date']?></td>
                                                <td><form action="book.php" method="post"><input type="submit" name="submit2" value="BOOK NOW" /><input type="date" style="display:none" name="availdate" value="<?=$row['available_Date']?>"/><input type="text" style="display:none" name="trainno" value="<?=$row['TrainNumber']?>"/><input type="text" style="display:none" name="trainname" value="<?=$row['TrainName']?>"/></form></td>
                                            </tr>
                                            
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
    }
}?>			
				</table></div>
<?php
if (isset($_POST['submit'])) {
    
    require_once('inc/header.php');
    $train_id=test_input($_POST['train_id']);

    $flag=0;
    $statement = $connection->prepare("SELECT * FROM trains WHERE TrainNumber= ?");
    $statement->execute(array($train_id)); 
    ?>	
    </head>
  <body>
    <div id="wrapper">

        <?php require_once('inc/header.php') ?>
        
        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> View <small>/ Schedule</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> View Schedule</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="view" class="col-md-12">
                                        <div class="col-md-12 forminput">
                                            <table class="table tablebg">
                                                <tr>
                                                    <th>Train Number</th>
                                                    <th>Train Name</th>
                                                    <th>Category</th>
                                                    <th>Source Station</th>
                                                    <th>Destination Station</th>
                                                </tr>
                                                <?php
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['TrainNumber'] ?> </td>
                                                    <td><?php echo $row['TrainName'] ?> </td>
                                                    <td><?php echo $row['Category']?></td>
                                                    <td><?php echo $row['Start']?></td>
                                                    <td><?php echo $row['End']?></td>
                                                </tr>
                                                <?php
                                                } ?>			
                                            </table>
                                
                                
                                            <table class="table tablebg">
                                            <h2 style="color:#fff;">Train Schedule</h2>
                                                <tr>
                                                    <th>Train ID</th>
                                                    <th>stop number</th>
                                                    <th>Station ID</th>
                                                    <th>Arrival Time</th>
                                                    <th>Departure Time</th>
                                                </tr>
                                                <?php
                                                    $statement = $connection->prepare("SELECT * FROM routes WHERE TrainNumber= ?");
                                                    $statement->execute(array($train_id));
                                                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['TrainNumber'] ?>  </td>
                                                    <td><?php echo $row['StopNumber'] ?> </td>
                                                    <td><?php echo $row['StationName'] ?> </td>
                                                    <td><?php echo date('H:m | d-m-y', strtotime($row['ArrivalTime'])) ?>  </td>
                                                    <td><?php echo date('H:m | d-m-y', strtotime($row['DepartureTime'])) ?>  </td>
                                                </tr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
			
<?php
    }; ?>
</table></div>
<?php
} else {
    if ($flag1!=0) {
?>
  </head>
  <body>
    <div id="wrapper">

        <?php require_once('inc/header.php') ?>
        
        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> View <small>/ Schedule</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> View Schedule</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="view" class="col-md-12">
                                        <form id="login-form" class="form" action="" method="post">
                                        <div class="form-group">
                                                <label class="text-info">Start Date:</label><br>
                                                <input type="date" name="startdate" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label class="text-info">End Date:</label><br>
                                                <input type="date" name="enddate" class="form-control" required >    
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Source Station:</label><br>
                                                <select  name="source_stn" type="text" class="form-control" required>
                                                    <option value="">Select Station....</option>
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
                                                    <option value="">Select Station....</option>
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
                                                <input type="submit" name="submit1" class="btn btn-primary" value="submit">
                                            </div>
                                        </form>
                                        
                                        <form style="margin-top:50px;" class="form-horizontal forminput" action="" method="post">
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"  for="sel1">Select Train Name</label>
                                            <div class="col-sm-6" >
                                            <select class="form-control forminp" id="sel1" name="train_id">
                                                <option value="">Select train Name ....</option>
                                            
                                            <?php

                                                $statement = $connection->prepare("SELECT * FROM  trains");
                                                $statement->execute(array());
                                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($result as $row) {
                                                ?>
                                                    <option value="<?php echo $row['TrainNumber']; ?>"><?php echo $row['TrainName'];?></option>
                                                <?php
                                                        }

                                                ?>
                                                </select>
                                                </div>
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
                                            <input type="submit" value="Submit" name="submit" class="btn btn-primary"/>
                                        </form>
                                        </div>
                                    </div>
                                </div>
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
<?php 
if ($flag==1 && $flag1==1) {
    include('inc/footer.php');
};
?>