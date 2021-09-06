


<?php
  require_once('inc/top.php');
?>
  </head>
  <body>
    <div id="wrapper">

    <?php require_once('inc/header.php') ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php') ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-sign-in"></i> Home <small>/ Home</small></h1><hr>
                    <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Home</li>
                    </ol>
                    <div id="login">
                        <div class="container">
                            <div id="login-row" class="row justify-content-center align-items-center">
                                <div id="login-column" class="col-md-9">
                                 
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                        <img src="https://www.pakrail.gov.pk/images/Slider/outsourcingAdvert.png" alt="Chania">
                                        <div class="carousel-caption">
                                            <!-- <h3>Los Angeles</h3>
                                            <p>LA is always so much fun!</p> -->
                                        </div>
                                        </div>

                                        <div class="item">
                                        <img src="https://www.pakrail.gov.pk/images/Slider/outsourcingAdvert.png" alt="Chicago">
                                        <div class="carousel-caption">
                                            <!-- <h3>Chicago</h3>
                                            <p>Thank you, Chicago!</p> -->
                                        </div>
                                        </div>

                                        <div class="item">
                                        <img src="https://www.pakrail.gov.pk/images/Slider/JazzCashBanner.jpg" alt="New York">
                                        <div class="carousel-caption">
                                            <!-- <h3>New York</h3>
                                            <p>We love the Big Apple!</p> -->
                                        </div>
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                    <form style="margin-top:50px;" class="form-horizontal forminput" action="view_schedule.php" method="post">
                                        
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


        <?php require_once('inc/footer.php') ?>