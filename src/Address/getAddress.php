<?php
    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {
        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }

        $sql = "SELECT * FROM  account INNER JOIN address ON account.id = userID WHERE userID='$idUser'";
        $address = executeResult($sql);
    }
?>