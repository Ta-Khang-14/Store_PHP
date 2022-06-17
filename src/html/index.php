<?php
    session_start();
?>
<!DOCTYPE html>
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
        <script src="../js/changeTypeView.js"></script>
        <title>Document</title>
    </head>
    <body>
        <?php include('./navbar.php') ?>
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
        <div class="main-content">
            <div class="container">
                <div class="row content-slide">
                    <div class="col col-12 col-md-12 col-lg-8">
                        <div
                            id="carouselExampleControls"
                            class="carousel slide"
                            data-bs-ride="carousel"
                        >
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        src="../images/Baner_1_01.png"
                                        class="d-block w-100"
                                        alt="..."
                                    />
                                </div>
                                <div class="carousel-item">
                                    <img
                                        src="../images/GD.png"
                                        class="d-block w-100"
                                        alt="..."
                                    />
                                </div>
                            </div>
                            <button
                                class="carousel-control-prev btn-custom"
                                type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev"
                            >
                                <span
                                    class="carousel-control-prev-icon"
                                    aria-hidden="true"
                                ></span>
                                <span class="visually-hidden"></span>
                            </button>
                            <button
                                class="carousel-control-next btn-custom"
                                type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="next"
                            >
                                <span
                                    class="carousel-control-next-icon"
                                    aria-hidden="true"
                                ></span>
                                <span class="visually-hidden"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col col-12 col-md-12 col-lg-4">
                        <div class="row content-banner">
                            <div
                                class="col col-6 col-md-6 col-lg-12 content-banner-item"
                            >
                                <a href="#">
                                    <img
                                        src="../images/baner_web_chinh_02.png"
                                        alt=""
                                    />
                                </a>
                            </div>
                            <div
                                class="col col-6 col-md-6 col-lg-12 content-banner-item"
                            >
                                <a href="#">
                                    <img
                                        src="../images/Baner_2_380x188_02.jpg"
                                        alt=""
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    include_once("../category/category.php");
                ?>
                 <div class="row content-menu">
                    <div class="col col-12">
                        <div
                            class="d-flex content-menu-wrapper justify-content-between align-items-center flex-wrap"
                        >
                            <div class="content-menu-title">
                                <h4>Sản phẩm mới</h4>
                            </div>
                            <?php 
                                include_once("../MySQL/dbprocess.php");
                                $categories = executeResult("SELECT * FROM category");
                            ?>
                            <ul class="d-flex flex-wrap">
                                <?php 
                                    foreach($categories as $item) {
                                        echo '
                                            <li><a href="product_ui.php?idCategory='.$item['id'].'">'.$item['name'].'</a></li>
                                        ';

                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row list-product">
                    <div class="col col-12">
                        <div class="row list-product-wrapper">
                            <?php 
                                include_once("../MySQL/dbprocess.php");
                                $productQuery = "SELECT * FROM product ORDER BY createdAt DESC LIMIT 5";
                                $product = executeResult($productQuery);
                                foreach($product as $item) {
                                    echo '
                                    <div
                                        class="col col-6 list-product-item col-md-6 col-lg-3"
                                    >
                                        <div class="list-product-item-wrapper">
                                            <div
                                                class="list-product-item-thumb text-center position-relative"
                                            >
                                                <img
                                                    src="'.$item['imgs'].'"
                                                    alt=""
                                                />
                                                <ul
                                                    class="list-product-action position-absolute d-flex justify-content-around"
                                                >
                                                    <li>
                                                        <a href="../Cart/addProduct.php?id='.$item['id'].'">
                                                            <span
                                                                class="lnr lnr-cart"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="./detail_product_ui.php?id='.$item['id'].'">
                                                            <span
                                                                class="lnr lnr-eye"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="'.'favorite_product.php?id='.$item['id'].'">
                                                            <span
                                                                class="lnr lnr-heart"
                                                            ></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="list-product-detail">
                                                <a href="product-detail.php?id='.$item['id'].'"
                                                    >'.$item['name'].'</a
                                                >
                                                <br />
                                                <span class="item-price"
                                                    >'.number_format($item['price']).'đ</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    ';

                                }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                    include_once("../MySQL/dbprocess.php");

                    foreach($categories as $item) {
                        $idCategory = $item['id'];
                        $types = executeResult("SELECT * FROM type WHERE idCategory='$idCategory'");
                        $renderList = "";

                        foreach($types as $type) {
                            $renderList .= '<li><a href="product_ui.php?idType='.$type['id'].'">'.$type['name'].'</a></li>';
                        }

                        $productQuery = "SELECT * FROM type INNER JOIN product ON product.idType = type.id
                            WHERE idCategory='$idCategory' LIMIT 5";
                        $product = executeResult($productQuery);
                        $renderProduct = "";
                        foreach($product as $b) {
                            $renderProduct .= '
                            <div
                                class="col col-6 list-product-item col-md-6 col-lg-3"
                            >
                                <div class="list-product-item-wrapper">
                                    <div
                                        class="list-product-item-thumb text-center position-relative"
                                    >
                                        <img
                                            src="'.$b['imgs'].'"
                                            alt=""
                                        />
                                        <ul
                                            class="list-product-action position-absolute d-flex justify-content-around"
                                        >
                                            <li>
                                                <a href="../Cart/addProduct.php?id='.$b['id'].'">
                                                    <span
                                                        class="lnr lnr-cart"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="detail_product_ui.php?id='.$b['id'].'">
                                                    <span
                                                        class="lnr lnr-eye"
                                                    ></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="'.'favorite_product.php?id='.$item['id'].'">
                                                    <span
                                                        class="lnr lnr-heart"
                                                    ></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="list-product-detail">
                                        <a href="product-detail.php?id='.$b['id'].'"
                                            >'.$b['name'].'</a
                                        >
                                        <br />
                                        <span class="item-price"
                                            >'.number_format($b['price']).'đ</span
                                        >
                                    </div>
                                </div>
                            </div>
                            ';

                        }
                        echo '
                            <div class="row content-menu">
                                <div class="col col-12">
                                    <div
                                        class="d-flex content-menu-wrapper justify-content-between align-items-center flex-wrap"
                                    >
                                        <div class="content-menu-title">
                                            <h4>'.$item['name'].'</h4>
                                        </div>
                                        <ul class="d-flex flex-wrap">
                                            '.$renderList.'
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row list-product">
                                <div class="col col-12">
                                    <div class="row list-product-wrapper">
                                        '.$renderProduct.'
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
        </div>
        
        <?php 
            include('./footer.php') ;
            include('./mobile_nav.php') ;
        ?>
        
    </body>
</html>
