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
        $sql = "DELETE FROM order_detail WHERE idOrder='$id'";
        if(execute($sql)) {
            if(execute("DELETE FROM orders WHERE id='$id'")) {
                $_SESSION['alert'] = "Hủy đơn hàng thành công";
            }
        } else {
            $_SESSION['alert'] = "Hủy đơn hàng thất bại";
        }

        header("Location: ../html/me.php");
    } else {
        header("Location: ../html/index.php");
    }
?>