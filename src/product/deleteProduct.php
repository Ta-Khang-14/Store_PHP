<?php
    session_start();
    include_once("../MySQL/dbprocess.php");

    if(isset($_SESSION['infor'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];
        if($_SESSION['infor']['role'] == 'admin') {
            $sql = "UPDATE product SET isDeleted=$status WHERE id='$id'";
            if(execute($sql)) {
                $_SESSION['alert'] = "Thành công";
                header("Location: ../html/me.php"); 
            }

        } else {
            $_SESSION['alert'] = "Bạn không đủ quyền để thực hiện hành động";
            header("Location: ../html/index.php");
        }
    } else {
        $_SESSION['alert'] = "Có lỗi xảy ra";
        header("Location: ../html/index.php");
    }
?>