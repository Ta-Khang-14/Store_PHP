<?php 
        session_start();
        include_once("../MySQL/dbprocess.php");
        if(isset($_SESSION['infor'])) {
    
            $email = $_SESSION['infor']['email'];
            if($_SESSION['infor']['role'] == 'admin') {

                if(isset($_GET['id'])) {
                    $status = $_GET['status'];
                    $id = $_GET['id'];
                    $response = execute("UPDATE account SET isActive = $status WHERE id = '$id'");
                    if($response) {
                        $_SESSION['alert'] = "Cập nhật tài khoản người dùng thành công";
                        header("Location: ../html/me.php");
                    } else {
                        $_SESSION['alert'] = "Có lỗi xảy ra";
                        header("Location: ../html/index.php");
                    }
                } else {
                    $_SESSION['alert'] = "Có lỗi xảy ra";
                    header("Location: ../html/index.php");
                }
            } else {
                $_SESSION['alert'] = "Bạn không đủ quyền để thực hiện hành động!";
                header("Location: ../html/index.php");
            }
        } else {
            $_SESSION['alert'] = "Có lỗi xảy ra";
            header("Location: ../html/index.php");
        }
?>