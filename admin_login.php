
<?php
  require_once('./inc/top.php');
  require_once('./db/admin_login.php');
?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('./inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Admin Login In <small>/ Login now</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Admin Login In</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">
                                        <form id="login-form" class="form" action="" method="post" name="signin-form">
                                            <?php
                                                echo $err;
                                            ?>
                                            <div class="form-group">
                                                <label for="username" class="text-info">Email:</label><br>
                                                <input name="email" type="email" class="form-control" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="text-info">Password:</label><br>
                                                <input name="password" type="password" type="password" class="form-control" required >
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
                                                <input type="submit" name="login" class="btn btn-primary" value="Log In">
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


        <?php require_once('./inc/footer.php') ?>