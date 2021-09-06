
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
                    <h1><i class="fa fa-sign-in"></i> Admin Home <small>/ Home </small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Admin Home </li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                    <div id="login-box" class="col-md-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('./inc/footer.php') ?>