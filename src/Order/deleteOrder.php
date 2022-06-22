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
        $status = executeResult("SELECT * FROM orders WHERE id = $id");
        if($status[0]['status'] != "Đã giao") {
            $sql = "UPDATE orders SET status='Đã hủy' WHERE id='$id'";
            if(execute($sql)) {
                $_SESSION['alert'] = "Hủy đơn hàng thành công";
            } else {
                $_SESSION['alert'] = "Hủy đơn hàng thất bại";
            }
        } else {
            $_SESSION['alert'] = "Không thể hủy vì đơn hàng đã giao thành công";
        }

        header("Location: ../html/me.php");
    } else {
        header("Location: ../html/index.php");
    }
?>