
<?php

    if(isset($_SESSION['user_email']) == "admin@gmail.com"){
      ?>  
        <div id="show" class="col-md-3">
            <div class="list-group">
                <a href="./profile.php" class="list-group-item active">
                    <i class="fa fa-user"></i> Admin
                </a>
                <a href="./add_route.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Add Route
                </a>
                <a href="./add_train.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Add Train
                </a>
                <a href="./add_train_status.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Add Train Status
                </a>
                <a href="./view_schedule.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> View Schedule
                </a>
                <a href="./view_booking.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> View Your Bookings
                </a>
                <a href="./booking.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Book Now
                </a>
                <a href="./cancel.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Cancel Booking
                </a>
                <a href="./pnr.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> PNR Status
                </a>
                <a href="./trains_between_stations.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Train Between Stations
                </a>
                <a href="./bookinghistory.php" class="list-group-item">
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </div>
        </div>
      <?php
    }else{
        ?>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="./profile.php" class="list-group-item active">
                        <i class="fa fa-user"></i> User
                    </a>
                    <a href="./view_schedule.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> View Schedule
                    </a>
                    <a href="./view_booking.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> View Your Bookings
                    </a>
                    <a href="./booking.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> Book Now
                    </a>
                    <a href="./cancel.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> Cancel Booking
                    </a>
                    <a href="./pnr.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> PNR Status
                    </a>
                    <a href="./trains_between_stations.php" class="list-group-item">
                        <i class="fa fa-folder-open"></i> Train Between Stations
                    </a>
                    <a href="./bookinghistory.php" class="list-group-item">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </div>
            </div>
        <?php
    }
?>
