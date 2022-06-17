<?php 
    session_start();
    include_once("../MySQL/dbprocess.php");
    if(isset($_SESSION['infor'])) {

        $email = $_SESSION['infor']['email'];
        if(!isset($_SESSION['infor']['id'])) {
            $sql2 = "SELECT * FROM account WHERE email = '$email'";
            $idUser= executeResult( $sql2)[0]['id'];
        } else {
            $idUser = $_SESSION['infor']['id'];
        }
        $id = $_GET['id'];
        $sql = "DELETE FROM address WHERE id='$id' AND userID='$idUser'";

        if(execute($sql)) {
            $_SESSION['alert'] = 'Xóa địa chỉ thành công';
        } else {
            $_SESSION['alert'] = 'Xóa địa chỉ thất bại';
        }
        header('Location: ../html/me.php');
    }
?>