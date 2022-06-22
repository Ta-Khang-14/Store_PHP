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
        $name = getPost("name");
        $email = getPost("email");
        $password = getPost("password");
        $confirmPassword = getPost("confirmPassword");

        if(!preg_match($emailRegex, $email)) {
            $error['message'] = "Email không đúng định dạng";
        }

        if(!preg_match($passwordRegex,$password) || !preg_match($passwordRegex,$confirmPassword)) {
            $error['message'] = 'Mật khẩu ít nhất 4 ký tự cả chữ thường, chữ hoa và số';
        }

        if ( !preg_match('/^[a-zA-Z\d_]{5,20}$/i', $name) ) {
            $error['message'] = 'Tên cần ít nhất 5 kí tự chỉ chứa chữ, số và dấu gạch dưới';
        }

        if($password != $confirmPassword) {
            $error['message'] = "Mật khẩu không trùng khớp";
        }

        if(empty($error)) {
            $sql = "SELECT * FROM account WHERE email = '$email'";
            $result1 = executeResult($sql);
            if (!empty($result1)) {
                $error['message'] = "Email đã tồn tại";
            } else {
                $sql = "INSERT INTO account (name, email, password, role) VALUES('$name', '$email', '$password', 'user')";
                $response = execute($sql);

                if($response) {
                    $sql1 = "SELECT * FROM account WHERE email='$email'";
                    $result = executeResult($sql1);
                    
                    $usid = $result[0]['id'];
                    execute("INSERT INTO favorite_product(idUser) VALUES ($usid)");
                    $sql2 = "INSERT INTO cart(idUser) VALUES('$usid')";
                    $response1 =  execute($sql2);

                    $_SESSION['infor'] = array('name'=>$name,'email' => $email, 'role'=>'user');
                    header('Location: ../html/index.php ');
                } 
            }
        } 
        

    }

?>
