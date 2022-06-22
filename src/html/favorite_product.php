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

        $list = executeResult("SELECT * FROM favorite_product WHERE idUser = $idUser");
        $idFavorite = $list[0]['id'];

        if(!empty($_GET['id'])) {
            $idProduct = $_GET['id'];

            $sql = "SELECT * FROM favorite_product_detail WHERE idFavorite=$idFavorite AND idProduct=$idProduct ";
            $product = executeResult($sql);
            if(!empty($product)) {
                $_SESSION['alert'] = "Sản phẩm đã có trong danh sách yêu thích!";
            } else {
                $response = execute("INSERT INTO favorite_product_detail(idFavorite, idProduct) VALUES($idFavorite, $idProduct)");
                if($response) {
                    $_SESSION['alert'] = "Thêm sản phẩm yêu thích thành công";
                }
            }
        }

        if(!empty($_GET['deleteId'])) {

            $deleteId = $_GET['deleteId'];
            $response = execute("DELETE FROM favorite_product_detail WHERE idFavorite=$idFavorite AND idProduct=$deleteId");
            if($response) {
                $_SESSION['alert'] = "Xóa sản phẩm yêu thích thành công!";
            }
        }
    } else {
        $_SESSION['alert'] = "Bạn cần đăng nhập!";
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="../css/base.css" />
        <link rel="stylesheet" href="../css/responsive.css" />
        <link rel="stylesheet" href="../css/cart.css" />
        <link rel="stylesheet" href="../css/detail.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/log.css" />
        <link rel="stylesheet" href="../css/path.css" />

        <link
            rel="stylesheet"
            href="../fontawesome-free-6.1.1-web/css/all.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"
        />
        <script src="../js/_jquery.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"
        ></script>
        <script src="../js/navbar.js"></script>
        <script src="../js/mobile_nav.js"></script>
        <script src="../js/changeTypeView.js"></script>
        <title>Document</title>
    </head>
    <body>
        <?php 
        var_dump($_SESSION['alert']);
            if(!empty($_SESSION['alert'])) {
                $message = $_SESSION['alert'];
                echo "
                    <script>
                        alert('$message')
                    </script>";
                $_SESSION['alert'] = '';
            }
        ?>
        
        <?php include('../html/navbar.php') ?>
        <div class="container-fluid">
            <div class="row path-main">
                <div class="col main-option">
                    <div class="main-option-wrapper">
                        <h3>DANH MỤC SẢN PHẨM</h3>
                        <ul class="main-list-option">
                            <?php 
                                include_once("../MySQL/dbprocess.php");

                                // GET list category
                                $sql = "SELECT * FROM category ";
                                $result = executeResult($sql);
                                $index = 1;

                                foreach($result as $item) {
                                    echo '
                                    <li class="main-list-option-item">
                                        <a href="product_ui.php?idCategory='.$item['id'].'">'.$item['name'].'</a>
                                    </li>
                                    ';
                                }
                            ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col main-product">
                    <div class="row list-product main-product">
                        <div class="col col-12">
                            <div class="row list-product-wrapper">
                            <?php
                                $query = "SELECT idUser, isDeleted, product.id, product.price, product.imgs, product.name FROM product INNER JOIN favorite_product_detail
                                    ON product.id = idProduct INNER JOIN favorite_product ON favorite_product.id = idFavorite WHERE idUser=$idUser AND isDeleted=0";
                                $product = executeResult($query);
                                foreach($product as $item) {
                                    $imgs = $item['imgs'];
                                    $price = number_format($item['price']);
                                    echo '
                                    <div class="col col-6 list-product-item col-md-6 col-lg-3" >
                                        <div class="list-product-item-wrapper">
                                            <div
                                                class="list-product-item-thumb text-center position-relative"
                                            >

                                                <img
                                                    src="'.$imgs.'"
                                                    alt=""
                                                />
                                                <ul
                                                    class="list-product-action position-absolute d-flex justify-content-around"
                                                >
                                                    <li>
                                                        <a href="../Cart/addProduct.php?id='.$item['id'].'&back=favorite_product.php">
                                                            <span
                                                                class="lnr lnr-cart"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.'detail_product_ui.php?id='.$item['id'].'">
                                                            <span
                                                                class="lnr lnr-eye"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.'favorite_product.php?deleteId='.$item['id'].'">
                                                            <span
                                                                class="lnr lnr-heart"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div
                                                class="list-product-detail position-relative"
                                            >
                                                <a href="'.'detail_product_ui.php?id='.$item['id'].'"
                                                    >'.$item['name'].'</a
                                                >
                                                <br />
                                     
                                                <span class="item-price"
                                                    >'.$price.'đ</span
                                                >
                                            </div>
                                        </div>
                                    </div>';
                                    }
                            ?>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../html/footer.php"); ?>
        <?php include("../html/mobile_nav.php"); ?>
    </body>
</html>