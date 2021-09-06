
<?php
  require_once('inc/top.php');
  require_once('db/login.php');
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
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">
                                        <form id="login-form" class="form" action="Ccancel.php" method="post" name="signin-form">
                                            <?php
                                                echo $err;
                                            ?>
                                            <div class="form-group">
                                                <label for="username" class="text-info">PNR number:</label><br>
                                                <input placeholder="pnr no." name="pnr" type="text" class="form-control" required >
                                            </div><br>
                                            <div class="form-group" style="text-align: center;">
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