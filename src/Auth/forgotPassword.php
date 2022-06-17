<?php
    include("../MySQL/dbprocess.php");
    include("../helper/getRequest.php");



    $name = $email = $password = $confirmPassword = "";
    $error = array();
    
    $emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{4,}$/";

    if(!empty($_POST)) {
        session_start();

        // Lay thong tin tu client gui len
        $email = getPost("email");
        $password = getPost("password");
        $confirmPassword = getPost("confirmPassword");

        if(!preg_match($emailRegex, $email)) {
            $error['message'] = "Email không đúng định dạng";
        }

        if(!preg_match($passwordRegex,$password) || !preg_match($passwordRegex,$confirmPassword)) {
            $error['message'] = 'Mật khẩu ít nhất 4 ký tự cả chữ thường, chữ hoa và số';
        }

        if($password != $confirmPassword) {
            $error['message'] = "Mật khẩu không trùng khớp";
        }

        if(empty($error)) {
            $sql = "SELECT * FROM account WHERE email = '$email'";
            $result1 = executeResult($sql);
            if (empty($result1)) {
                $error['message'] = "Email không tồn tại";
            } else {
                $sql = "UPDATE account SET password='$password' WHERE email='$email'";
                $response = execute($sql);

                if($response) {
                    $_SESSION['alert'] = "Đặt lại mật khẩu thành công";
                    header('Location: ../html/login_ui.php ');
                } else {
                    $_SESSION['alert'] = "Đặt lại mật khẩu thất bại";
                    header('Location: ../html/index.php ');
                }
            }
        } 
        

    }

?>
