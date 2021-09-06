<?php

    session_start();
    $err = "";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM admin_table WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            $err = '<p class="error" style="color:red; text-align: center;">Username & password is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                header('location:./admin_home.php');
                
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['user_name'] = $result['firstname'];
                $_SESSION['user_cnic'] = $result['cnic'];
                $_SESSION['user_phone'] = $result['phone'];
                $_SESSION['user_email'] = $result['email'];
                $_SESSION['user_station'] = $result['station'];
                $err = '<p class="success" style="color:green; text-align: center;">Congratulations, you are logged in!</p>';
            } else {
                $err = '<p class="error" style="color:red; text-align: center;">Username & password is wrong!</p>';
            }
        }
    }
?>