
<?php
  require_once('inc/top.php');
  require_once('db/login.php');

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['submit']))
    {
    
        $train_id=test_input($_POST['train_id']);
        $stop_number=test_input($_POST['stop_number']);
        $station_id=test_input($_POST['station_id']);
        $arrival_time=test_input($_POST['arrival_time']);
        $departure_time=test_input($_POST['departure_time']);
     
     $statement = $connection->prepare("INSERT INTO routes (TrainNumber,StopNumber,StationName,ArrivalTime,DepartureTime)VALUES(?,?,?,?,?)");
            
        $statement->execute(array($train_id,$stop_number,$station_id,$arrival_time,$departure_time));
        header("location:admin_home.php");
    } 
    
?>
<script>
function validate_from()
			{
				var x=document.forms["adform"]["train_id"].value;
				if(x==null || x=="")
				{
					alert("Enter your Train ID");
					return false;
				}
				x=document.forms["adform"]["stop_number"].value;
				if(x==null || x=="")
				{
					alert("Enter stop number");
					return false;
				}
				x=document.forms["adform"]["station_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Station ID");
					return false;
				}
				x=document.forms["adform"]["arrival_time"].value;
				if(x==null || x=="")
				{
					alert("Enter Arrival time");
					return false;
				}
				x=document.forms["adform"]["departure_time"].value;
				if(x==null || x=="")
				{
					alert("Enter Departure time");
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
                    <h1><i class="fa fa-sign-in"></i> Add <small>/ Route</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Add Route</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">
                                        <form class="form" name="adform" action="" onsubmit="return validate_from()" method="post">
                                            
                                            <div class="form-group">
                                                <label for="username" class="text-info">Train Number:</label><br>
                                                <input name="train_id" placeholder="Train_ID" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Stop Number:</label><br>
                                                <input name="stop_number" placeholder="stop_number" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Station Name:</label><br>
                                                <input name="station_id" placeholder="Station_ID" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Arrival Time:</label><br>
                                                <input name="arrival_time" placeholder="Arrival_time" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Departure Time:</label><br>
                                                <input name="departure_time" placeholder="Departure_time" type="text" class="form-control" required >
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