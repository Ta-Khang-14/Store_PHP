<?php
    session_start();
    $id = array();

    if(!empty($_GET['idType'])) {
        $id['id'] = 'idType';
        $id['value'] = $_GET['idType'];
    }

    if(!empty($_GET['idCategory'])) {
        $id['id'] = 'idCategory';
        $id['value'] = $_GET['idCategory'];
    }
    
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
                    <div class="main-option-wrapper mt-3">
                        <h3>BY PRICE</h3>
                        <form class="option-price">
                            <?php 
                                if(!empty($id)) {
                                    echo '<input type="text" name="'.$id['id'].'" value="'.$id['value'].'" class="d-none">';
                                }
                            ?>
                            <input type="radio" name="price" value="1000000">
                            <label class="mb-0" style="transform: translateY(-2px); font-size: 14px;">Dưới 1.000.000đ</label>
                            <br>
                            <input type="radio" name="price" value="10000000">
                            <label class="mb-0" style="transform: translateY(-2px); font-size: 14px;">Dưới 10.000.000đ</label>
                            <br>
                            <input type="radio" name="price" value="50000000">
                            <label class="mb-0" style="transform: translateY(-2px); font-size: 14px;">Dưới 50.000.000đ</label>
                            <br>
                            <input class="btn btn-danger mt-3" type="submit" value="Lọc">
                            <div class="price-label mt-2">
                                <span>Price: </span>
                                <span class="price">
                                    <span>0</span>đ - <span>50.000.000</span>đ
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col main-product">
                    <div
                        class="main-product-option d-flex flex-wrap justify-content-between align-items-center"
                    >
                        <p class="mb-0">Sản phẩm</p>
                        <div
                            class="main-product-option-filter d-flex align-items-center"
                        >
                        <form id="formQuery">
                            <select name="sort" id="select" class="product-select-sort">
                                <option >Sắp xếp mặc định</option>
                                <option value="createdAt">Mới</option>
                                <option value="price">Sắp xếp: Giá giảm dần</option>
                                <option value="-price">Sắp xếp: Giá tăng dần</option>
                            </select>
                            <?php 
                                if(!empty($id)) {
                                    echo '<input type="text" name="'.$id['id'].'" value="'.$id['value'].'" class="d-none">';
                                }
                            ?>
                        </form>
                        <script>
                            $('#select').on('change', (e) => {
                                if($('#select option:selected').val()) {
                                    $("#formQuery").submit();
                                }
                            })
                        </script>
                            <div
                                class="product-filter-view d-flex align-items-center"
                            >
                                <p class="mb-0">View</p>
                                <a href="#">
                                    <span
                                        class="lnr lnr-dice table-view active"
                                    ></span>
                                </a>
                                <a href="#">
                                    <span class="lnr lnr-list list-view"></span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <?php include("../product/genderProduct.php"); ?>

                    <div class="main-option-title">
                        <div class="option-title">
                            <h4>Sản phẩm hot</h4>
                        </div>
                        <?php include("../product/render_top_product.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../html/footer.php"); ?>
        <?php include("../html/mobile_nav.php"); ?>
    </body>
</html>