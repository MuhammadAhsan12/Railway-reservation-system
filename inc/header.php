        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" style="margin-top: 0; padding-top : 3px;" href="index.php"><img style="width: 40px; margin-top: 0" src="https://media-exp1.licdn.com/dms/image/C510BAQHi6hkrA-C8Lw/company-logo_200_200/0/1567284709254?e=2159024400&v=beta&t=ib2-4J_O-7700vSzSUWWB-0Txn3EjZDrF7twH1YHfJw" alt=""></a>
              <a class="navbar-brand" href="index.php">PakRailway</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="./index.php"><i class="fa fa-plus-square"></i> Home</a></li>
                <li><a href="./view_schedule.php"><i class="fa fa-user-plus"></i> train info</a></li>
                <li><a href="./admin_login.php"><i class="fa fa-user-plus"></i> admin</a></li>
                <?php 
                  if(isset($_SESSION['user_id'])){
                    echo '<li><a href="./profile.php"><i class="fa fa-user"></i> Profile</a></li>';
                    echo '<li><a href="db/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>';
                  }else{
                    echo '<li><a href="./loginform.php"><i class="fa fa-sign-in"></i> Login</a></li>';
                    echo '<li><a href="./regestrform.php"><i class="fa fa-sign-out"></i> Signup</a></li>';
                  }
                ?>
              </ul>
            </div>
          </div>
        </nav>