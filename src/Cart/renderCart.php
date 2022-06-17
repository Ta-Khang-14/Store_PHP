<div class="main-cart">
    <ul
        class="cart-list-product position-relative py-4"
    >
    <?php
        if(isset($_SESSION['infor'])) {
            include_once('getCart.php');
            $sum = 0;
            foreach($product as $item) {
                $sum += $item['total'];
                echo '
                    <li class="d-flex product-cart py-3 border-bottom position-relative cart-detail-item">
                        <img
                            src="'.$item['imgs'].'"
                            alt=""
                            style="max-width: 120px; max-height: 120px;"
                        />
                        <div class="detail">
                            <a href="product-detail.html">
                            '.$item['name'].'
                            </a>
                            <p>'.$item['quantity'].' x '.$item['price'].'₫</p>
                        </div>
                        <a
                            href="#"
                            class="position-absolute delete"
                        >
                            <span
                                class="lnr lnr-cross yellow-hover btn-cart"
                            ></span>
                        </a>
                    </li>
                ';
            }
    ?>
        <div class="cart-action p-0">
            <div
                class="sum-money d-flex justify-content-between"
            >
                <p>Tổng:</p>
                <p><?=number_format($sum) ?>đ</p>
            </div>
            <div
                class="btn-cart d-flex justify-content-between"
            >
                <div class="btn btn-danger">
                    <a href="order_ui.php" id="cart-link" style="color: white;">Thanh Toán</a>
                </div>
            </div>
        </div>
    <?php
        } else {
            header("Location: ../html/index.php");
        }
    ?>
    </ul>
</div>

                    
