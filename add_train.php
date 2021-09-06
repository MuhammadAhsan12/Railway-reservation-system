
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
        $train_id=test_input($_POST['train_id']);
        $train_name=test_input($_POST['train_name']);
        $train_type=test_input($_POST['train_type']);
        $source_stn=test_input($_POST['source_stn']);
        $destination_stn=test_input($_POST['destination_stn']);

        $statement = $connection->prepare("INSERT INTO trains (TrainNumber,TrainName,Category,Start,End) VALUES (?,?,?,?,?)");
            
        $statement->execute(array($train_id,$train_name,$train_type,$source_stn,$destination_stn));
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
				x=document.forms["adform"]["train_name"].value;
				if(x==null || x=="")
				{
					alert("Enter Train name");
					return false;
				}
				x=document.forms["adform"]["train_type"].value;
				if(x==null || x=="")
				{
					alert("Enter Train type");
					return false;
				}
				x=document.forms["adform"]["off_day"].value;
				if(x==null || x=="")
				{
					alert("Enter Train Off Day");
					return false;
				}
				x=document.forms["adform"]["source_stn"].value;
				if(x==null || x=="")
				{
					alert("Enter Source stn");
					return false;
				}
				x=document.forms["adform"]["destination_stn"].value;
				if(x==null || x=="")
				{
					alert("Enter Destination stn");
					return false;
				}
				x=document.forms["adform"]["source_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Source ID number");
					return false;
				}
				x=document.forms["adform"]["destination_id"].value;
				if(x==null || x=="")
				{
					alert("Enter Destination ID");
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
                    <h1><i class="fa fa-sign-in"></i> Add <small>/ Train</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Add Train</li>
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
                                                <label for="password" class="text-info">Train Name:</label><br>
                                                <input name="train_name" placeholder="train_name" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Train Type:</label><br>
                                                <input name="train_type" placeholder="train_type" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Source Station:</label><br>
                                                <input name="source_stn" placeholder="source_stn" type="text" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Destination Station:</label><br>
                                                <input name="destination_stn" placeholder="destination_stn" type="text" class="form-control" required >
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