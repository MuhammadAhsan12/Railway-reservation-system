<?php
    session_start();
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


<?php
  require_once('./inc/top.php');
?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <!-- <div class="col-md-9">
                    <center>
                        <h1>Id =<?php echo $id ?></h1>
                        <h1>Name =<?php echo $name ?></h1>
                        <h1>Email =<?php echo $email ?></h1>
                    </center>
                </div> -->
                    <h1><i class="fa fa-user"></i> Hi <?php echo $name ?> <small></small></h1><hr> 
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Profile</li>
                    </ol>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">
                                        <form id="login-form" class="form" action="" method="post" name="signup-form">
                                            <div class="form-horizontal well">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                       <span id="Label1"><i class="fa fa-user"></i><strong>&nbsp;first Name: </strong></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <span id="lblName"><?php echo $name ?></span>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                     <div class="col-md-3">
                                                       <span id="Label4"><i class="fa fa-tablet"></i><strong>&nbsp;CNIC No:</strong></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <span id="lblCNIC"><?php echo $cnic ?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <div class="col-md-3">
                                                       <span id="Label2"><i class="fa fa-phone"></i><strong>&nbsp;Mobile No: </strong></span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span id="lblMobileNo"><?php echo $phone ?></span>
                                                        
                                                       <span class="badge badge-success" style="color:white">Verified</span>   
                                                    </div>
                                                    <div class="col-md-5">
                                                    <span id="rgMobNo" class="ValidatorMessage" style="display:none;">Mobile number must be like 92xxxxxxxxxx</span>
                                                        </div>
                                                </div>
                                                 <div class="form-group">
                                                     <div class="col-md-3">
                                                       
                                                    </div>
                                                    <div class="col-sm-4">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                     <div class="col-md-3">
                                                       <span id="lblEmailAddress"><i class="fa fa-envelope"></i><strong>&nbsp;Email Address: </strong></span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <span id="lblEmail"><?php echo $email ?></span>
                                                         
                                                        <span class="badge badge-success" style="color:white">Verified</span>
                                                    </div>
                                                </div>                                               
                                               <div class="form-group">
                                                    <div class="col-md-3">
                                                       <span id="Label3"><i class="fa fa-home"></i><strong>&nbsp;Nearest Station:</strong></span>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <span id="lblEmail"><?php echo $station ?></span>
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