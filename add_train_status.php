
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

    $pname=test_input($_POST['pname']);
    $date=test_input($_POST['date']);
    $seat_no=test_input($_POST['seat_no']);

    $statement = $connection->prepare("INSERT INTO train_status (TrainNumber,available_Date,booked_seats,available_seats) VALUES (?,?,?,?)");
		
	$statement->execute(array($pname,$date,'0',$seat_no));
	header("location:admin_home.php");
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
				x=document.forms["adform"]["train_no"].value;
				if(x==null || x=="")
				{
					alert("Enter train_no no.");
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
                    <h1><i class="fa fa-sign-in"></i> Add <small>/ Train Status</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Add Train Status</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">
                                        <form class="form" name="adform" action="" onsubmit="return validate_from()" method="post">
                                            <div class="form-group">
                                                <label for="username" class="text-info">Select Train Name:</label><br>
                                                <select name="pname" type="text" class="form-control" required>
                                                    <option>Select train Name ....</option>
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
                                            <div class="form-group">
                                                <label for="password" class="text-info">Available Date:</label><br>
                                                <input placeholder="date : 2021-10-01" name="date" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Number of seats:</label><br>
                                                <input name="station_id" placeholder="Station_ID" type="text" class="form-control" required >
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