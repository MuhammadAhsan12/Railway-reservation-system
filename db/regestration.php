<?php

session_start();
$err = "";

if(isset($_POST['register'])){
    $firstname = $_POST['username'];
    $cnic = $_POST['cnic'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $station = $_POST['station'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $err = '<p class="error" style="color:red; text-align: center;">The email address is already registered!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(firstname,cnic,phone,email,station,password) VALUES (:firstname,:cnic,:phone,:email,:station,:password_hash)");
        $query->bindParam("firstname", $firstname, PDO::PARAM_STR);
        $query->bindParam("cnic", $cnic, PDO::PARAM_STR);
        $query->bindParam("phone", $phone, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("station", $station, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            $err = '<p class="success" style="color:green; text-align: center;">Your registration was successful!</p>';
        } else {
            $err = '<p class="error" style="color:red; text-align: center;">Something went wrong!</p>';
        }
    }
}

?>