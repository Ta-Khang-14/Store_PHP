<?php 
    session_start();
    if(empty($_SESSION['infor'])) {
        $_SESSION['alert'] = "Bạn cần đăng nhập để xem giỏ hàng";
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header_store.php')?>
    <body>
        <?php include("navbar.php")?>
        <div class="container mt-5">
            <?php include_once('../Cart/renderCart.php') ?>
        </div>
        <script>
            $("document").ready(() => {
                $("#cart-link").on("click", e => {
                    if($('.cart-detail-item').length == 0 ) {
                        e.preventDefault();
                    }
                })
                
            })
        </script> 
        <?php include("footer.php")?>
        <?php include("mobile_nav.php")?>
    </body>
</html>