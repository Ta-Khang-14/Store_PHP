<?php
    include ("../Auth/forgotPassword.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header_store.php")?>
    <body>
        <!-- HEADER -->
        <?php include('./navbar.php')?>
        <?php 
            if(!empty($_SESSION['alert'])) {
                $message = $_SESSION['alert'];
                echo "
                    <script>
                        alert('$message')
                    </script>";
                $_SESSION['alert'] = '';
            }
        ?>
        <div class="gray-bg">
            <form
                class="login form-log active blabla"
                method="POST"
                enctype="multipart/form-data"
                active
            >
                <h3 class="text-center">Đặt lại mật khẩu</h3>
                <input
                    required
                    type="email"
                    name="email"
                    id="1"
                    placeholder="Email"
                    class="my-2 p-2 input-text"
                />
                <br />
                <input
                    required
                    type="password"
                    name="password"
                    id="2"
                    placeholder="Password"
                    class="my-2 p-2 input-text"
                />
                <input
                    required
                    type="password"
                    name="confirmPassword"
                    id="2"
                    placeholder="Confirm password"
                    class="my-2 p-2 input-text"
                />
                <?php 
                    if(!empty($error) ) {
                        echo '
                        <div class="invalid-feedback d-block">'.
                        $error['message'].
                        '</div>';
                    }
                ?> 
                <br />
                <div class="invalid-feedback d-block"></div>
                <input
                    required
                    type="submit"
                    value="Đặt lại mật khẩu"
                    class="btn btn-danger my-2 mt-3"
                />
                <a href="register_ui.php" class="my-2 mt-3 dangki"> Đăng kí</a>
            </form>
            </script>
        </div>
        <!-- FOOTER -->
        <?php include_once("footer.php"); ?>

        <!-- JS -->
        <script src="../js/mobile_nav.js"></script>
    </body>
</html>
