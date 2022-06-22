<?php
    $sql = "SELECT product.id,product.price, product.imgs, product.name, sum(order_detail.quantity) as SL FROM `product` INNER JOIN order_detail ON product.id = order_detail.idProduct
        WHERE isDeleted=0
        GROUP BY  order_detail.idProduct
        ORDER BY SL DESC LIMIT 4";

    $products = executeResult($sql);

?>
<div class="row list-product main-product">
    <div class="col col-12">
        <div class="row list-product-wrapper">
            <?php 

            foreach($products as $item) {
                $imgs = processImg($item['imgs']);
                $price = number_format($item['price']);
                echo '
                <div class="col col-6 list-product-item col-md-6 col-lg-3" >
                    <div class="list-product-item-wrapper">
                        <div
                            class="list-product-item-thumb text-center position-relative"
                        >

                            <img
                                src="'.$imgs[0].'"
                                alt=""
                            />
                            <ul
                                class="list-product-action position-absolute d-flex justify-content-around"
                            >
                                <li>
                                    <a href="../Cart/addProduct.php?id='.$item['id'].'&back=product_ui.php?'.$type['id'].'='.$type['value'].'">
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
                                    <a href="'.'favorite_product.php?id='.$item['id'].'">
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
                            <div
                                class="product-type-list position-absolute"
                            >
                                <div class="btn btn-danger">
                                    Thêm vào giỏ hàng
                                </div>
                                <div
                                    class="favorite text-center"
                                >
                                    <a href="#">
                                        <span
                                            class="lnr lnr-heart"
                                        ></span>
                                        Yêu thích
                                    </a>
                                </div>
                            </div>
                            <span class="item-price"
                                >'.$price.'đ</span
                            >
                        </div>
                    </div>
                </div>';
            };

            ?>

        </div>
    </div>
</div>