<?php 

    include_once("../MySQL/dbprocess.php");
    session_start();
    if(isset($_SESSION['infor'])) {
        if($_SESSION['infor']['role'] == 'admin') {
            $id = !empty($_GET['id']) ? $_GET['id'] : "";
            $sql = "UPDATE orders SET status='Đã giao' WHERE id = '$id'";
            if(execute($sql)) {
                $_SESSION['alert'] = "Cập nhật đơn hàng thành công";
                echo"HHHHHA";
                header('Location: ../html/me.php');
            } else {
                $_SESSION['alert'] = "Có lỗi xảy ra";
                header('Location: ../html/me.php');
            }
        } else {
            $_SESSION['alert'] = "Có lỗi xảy ra";
            header('Location: ../html/index.php');
        }
    } else {
        $_SESSION['alert'] = "Có lỗi xảy ra";
        header('Location: ../html/index.php');
    }

?>