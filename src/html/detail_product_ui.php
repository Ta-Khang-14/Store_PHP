<?php 
    include_once("../MySQL/dbprocess.php");
    session_start();
    if(!empty($_GET)) {
        $idProduct = $_GET['id'];
        $sql = "SELECT * FROM product WHERE id='$idProduct'";
        $product = executeResult($sql)[0];
    } else {
        $_SESSION['alert'] = "Có lỗi xảy ra";
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("header_store.php") ?>
<body>
    <?php include('navbar.php') ?>
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
            <!-- PRODUCT-INFOR -->
            <div class="container">
                <div class="row froduct-infor mb-3">
                    <div class="col col-12">
                        <div class="row froduct-infor-wrapper m-0 py-3">
                            <div class="col col-12 col-md-5">
                                <div class="froduct-infor-img">
                                    <img
                                        src="<?= $product['imgs']?>"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="col col-12 col-md-7">
                                <div class="froduct-infor-option">
                                    <h3 class="product-info-title">
                                        <?= $product['name']?>
                                    </h3>
                                    <h3
                                        class="product-infor-price py-4 border-bottom"
                                    >
                                    <?= number_format($product['price']) ?>đ
                                    </h3>
                                    <div
                                        class="product-infor-btn d-flex align-items-center py-4 border-bottom"
                                    >
                                        <div
                                            class="product-count d-flex align-items-center position-relative py-4" style="width:90px;"
                                        >
                                            <input type="number" name="quantity" min="1" id="quantity" value="1" class="form-control">
                                        </div>
                                        <div class="btn btn-danger mx-2">
                                            <a href="../Cart/addProduct.php?id=<?=$product['id']?>&quantity=1&back=detail_product_ui.php?id=<?=$product['id']?>" style="color: white;" id='add-cart-link'>Thêm vào giỏ hàng</a> 
                                        </div>
                                        <?php 
                                            echo '
                                            <a href="'.'favorite_product.php?id='.$product['id'].'">
                                                <span class="lnr lnr-heart"></span>
                                            </a>
                                            ';
                                        ?>

                                    </div>
                                    <div class="product-model my-4"></div>
                                </div>
                                <script>
                                    $('document').ready(() => {
                                        $("#quantity").on("change", () => {
                                            let quantity = $("#quantity").val();
                                            $("#add-cart-link").attr("href", `../Cart/addProduct.php?id=<?=$product['id']?>&quantity=${quantity}&back=detail_product_ui.php?id=<?=$product['id']?>`);
                                        })
                                        $("#add-cart-link").on("click", (e) => {
                                            if(+$("#quantity").val() < 1) {
                                                alert("Số sản phẩm không thể nhỏ hơn 1");
                                                e.preventDefault();
                                            }
                                        })
                                    })
                                </script>
                                <ul class="contact d-flex mt-3">
                                    <li class="text-center mr-2" id="facebook">
                                        <a href="">
                                            <i
                                                class="fa-brands fa-facebook-f"
                                            ></i>
                                        </a>
                                    </li>
                                    <li class="text-center mx-2" id="twitter">
                                        <a href=""
                                            ><i class="fa-brands fa-twitter"></i
                                        ></a>
                                    </li>
                                    <li class="text-center mx-2" id="ggpls">
                                        <a href=""
                                            ><i
                                                class="fa-brands fa-google-plus-g"
                                            ></i
                                        ></a>
                                    </li>
                                    <li class="text-center mx-2" id="linkedin">
                                        <a href="">
                                            <i
                                                class="fa-brands fa-linkedin-in"
                                            ></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row product-description mt-3">
                            <div class="col col-12 col-md-8">
                                <div class="product-description-wrapper">
                                    <ul
                                        class="d-flex justify-content-around border-bottom"
                                    >
                                        <li class="active">Mô tả</li>
                                    </ul>
                                    <div
                                        class="product-description-content description active"
                                    >
                                        <p><?=$product['description']?></p>
                                    </div>
                                    <div
                                        class="product-description-content infomation"
                                    ></div>
                                    <div
                                        class="product-description-content rating"
                                    ></div>
                                    <div
                                        class="product-description-content comment"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('footer.php') ?>
</body>
</html>