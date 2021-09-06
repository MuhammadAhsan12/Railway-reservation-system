
<?php
  require_once('inc/top.php');
  require_once('db/regestration.php');
?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-out"></i> Sign Up <small>/ Regester now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Sign Up</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box a" class="col-md-12">
                                        <form id="login-form" class="form" action="" method="post" name="signup-form">
                                            <?php
                                                echo $err;
                                            ?>
                                            <div class="form-group">
                                                <label for="username" class="text-info">first Name:</label><br>
                                                <input name="username" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">CNIC no:</label><br>
                                                <input name="cnic" type="phone" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Mobile no:</label><br>
                                                <input name="phone" type="phone" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Email:</label><br>
                                                <input name="email" type="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Nearest Station:</label><br>
                                                <select name="station" type="text" class="form-control" required>
                                                    <option>karachi cant</option>
                                                    <option>Malir cant</option>
                                                    <option>Lahore cant</option>
                                                    <option>Rawalpindi cant</option>
                                                    <option>Queta cant</option>
                                                    <option>Pishawer cant</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Password:</label><br>
                                                <input name="password" type="password" type="password" class="form-control" required>
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
                                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                                <input type="submit" name="register" class="btn btn-primary" value="Sign Up">
                                            </div>
                                            <div id="register-link" class="text-right" style="text-align: center;">
                                                <h5 href="#" class="text-info">if you are already a user?<a style="cursor: pointer;" href="./loginform.php"> login here</a></h5>
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