<?php
    include("../MySQL/dbprocess.php");
    include("../helper/getRequest.php");


    session_start();

    $email = $password = "";
    $error = array();
    
    $emailRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{4,}$/";

    if(!empty($_POST)) {
        $email = getPost('email');
        $password = getPost('password');

        if(!preg_match($emailRegex, $email)) {
            $error['message'] = "Email không đúng định dạng";
        }

        if(!preg_match($passwordRegex,$password)) {
            $error['message'] = 'Mật khẩu ít nhất 4 ký tự cả chữ thường, chữ hoa và số';
        }

        if(empty($error)) {
            $sql = "SELECT name, role, email FROM account WHERE email = '$email' AND password = '$password' ";
            $result = executeResult($sql);

            if(!empty($result)) {
                $_SESSION['infor'] = $result[0];
                header('Location: ../html/index.php ');
            } else {
                $error['message'] = "Tên đăng nhập hoặc mật khẩu không chính xác.";
            }
        } 

    }

?>
