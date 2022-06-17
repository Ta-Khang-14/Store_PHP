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

        if(isset($_POST)) {
            $password = $_POST['password'];
            $user = executeResult("SELECT * FROM account WHERE id='$idUser' AND password='$password'");

            if(!empty($user)) {
                $newPassword = $_POST['newPassword'];
                $response = execute("UPDATE account SET password='$newPassword' WHERE id='$idUser'");
                if($response) {
                    $_SESSION['alert'] = "Đổi mật khẩu thành công";
                } else {
                    $_SESSION['alert'] = "Có lỗi xảy ra";
                }
            } else {
                $_SESSION['alert'] = "Không đúng mật khẩu";
            }
        }   

        header("Location: ../html/me.php");
    }
?>