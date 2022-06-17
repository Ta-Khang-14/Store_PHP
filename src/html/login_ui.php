<?php
    include ("../Auth/login.php");
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("./header_store.php")?>
    <body>
        <!-- HEADER -->
        <?php include('./navbar.php')?>

        <div class="gray-bg">
            <form
                class="login form-log active"
                method="POST"
                enctype="multipart/form-data"
            >
                <h3 class="text-center">Đăng nhập</h3>
                <p>Đăng nhập tài khoản của bạn</p>
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
                <?php 
                    if(!empty($error) ) {
                        echo '
                        <div class="invalid-feedback d-block">'.
                        $error['message'].
                        '</div>';
                    }
                ?> 
                <br />
                <a href="#" class="my-2"> Quên mật khẩu?</a>
                <br />

                <input
                    required
                    type="submit"
                    value="Đăng nhập"
                    class="btn btn-danger my-2 mt-3"
                />
                <a href="register_ui.php" class="my-2 mt-3 dangki"> Đăng kí</a>
            </form>
            </script>
        </div>
        <!-- FOOTER -->
        <footer>
            <div class="container footer">
                <div class="row footer-content">
                    <div class="col col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col col-12 col-md-4">
                                <div class="footer-content-item">
                                    <h6 class="footer-content-title">
                                        Đồ gia đình
                                    </h6>
                                    <p class="gray-letter">
                                        Đồ Gia Đình luôn đảm bảo nguồn gốc xuất
                                        xứ rõ ràng, chính sách bán hàng linh
                                        hoạt, thanh toán nhanh chóng, tiện lợi.
                                        Các chính sách hậu mãi, bảo hành đầy đủ
                                        đúng như khẩu hiệu của hệ thống
                                        <b> "Chất lượng, Giá trị đích thực"</b>.
                                    </p>
                                </div>
                            </div>
                            <div class="col col-md-4 col-12">
                                <div class="footer-content-item">
                                    <h6 class="footer-content-title">
                                        Địa chỉ cửa hàng
                                    </h6>
                                    <p class="gray-letter">
                                        Trụ sở chính: Tầng 3, toàn Hà Thành
                                        Plaza, 102 Thái Thịnh, Đống Đa, Hà Nội
                                    </p>
                                </div>
                            </div>
                            <div class="col col-md-4 col-12">
                                <div class="footer-content-item">
                                    <h6 class="footer-content-title">
                                        Chính sách
                                    </h6>
                                    <p class="gray-letter">
                                        Chính sách bảo mật
                                    </p>
                                    <p class="gray-letter">
                                        Chính sách mua hàng
                                    </p>
                                    <p class="gray-letter">
                                        Chính sách bảo hành
                                    </p>
                                    <p class="gray-letter">
                                        Chính sách đổi trả
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 col-12">
                        <div class="footer-content-item">
                            <h5 class="footer-content-title">
                                Đăng kí nhận thông tin
                            </h5>
                            <form
                                action=""
                                class="form-control border-0 d-flex infor-email px-0"
                            >
                                <input
                                    class="form-control"
                                    type="search"
                                    placeholder="Địa chỉ email"
                                    aria-label="Search"
                                    id="footer-input-email"
                                />
                                <input
                                    type="submit"
                                    value="Đăng ký"
                                    class="form-control"
                                    id="footer-submit-email"
                                />
                            </form>
                            <div class="facebook-contact">
                                <a href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">© All Rights Reserved</div>
            </div>
        </footer>

        <!-- NAVBAR MOBILE -->
        <div class="navbar-mobile border-top position-sticky">
            <ul class="d-flex align-items-center justify-content-around">
                <li>
                    <a href="#" id="mobile-menu"
                        ><span class="lnr lnr-menu"></span>
                        <p>Menu</p></a
                    >
                </li>
                <li>
                    <a href="#" id="mobile-list"
                        ><span class="lnr lnr-list"></span>
                        <p>Danh mục</p></a
                    >
                </li>
                <li>
                    <a href="#" id="mobile-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <p>Tìm kiếm</p>
                    </a>
                </li>
                <li>
                    <a href="#" id="cart-mobile">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <p>Giỏ hàng</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="modal modal-custom"></div>

        <div class="navbar-mobile-option position-fixed" id="menu">
            <div class="navbar-mobile-option-title position-relative">
                <h3>MENU</h3>
                <a href="#" class="position-absolute">
                    <span class="lnr lnr-cross yellow-hover btn-menu"></span>
                </a>
            </div>
            <ul class="navbar-mobile-option-list">
                <li class="border-bottom"><a href="path.html">Tivi</a></li>
                <li class="border-bottom">
                    <a href="path.html">Điện gia dụng</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Sản phẩm khác</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Máy giặt, máy sấy</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Bình nóng lạnh, máy lọc nước</a>
                </li>
                <li class="border-bottom"><a href="path.html">Tủ lạnh</a></li>
                <li class="border-bottom"><a href="news.html">Tin tức</a></li>
            </ul>
        </div>

        <div class="navbar-mobile-option position-fixed" id="list-op">
            <div class="navbar-mobile-option-title position-relative">
                <h3>Danh mục sản phẩm</h3>
                <a href="#" class="position-absolute">
                    <span class="lnr lnr-cross yellow-hover btn-list"></span>
                </a>
            </div>
            <ul class="navbar-mobile-option-list">
                <li class="border-bottom"><a href="path.html">Tivi</a></li>
                <li class="border-bottom">
                    <a href="path.html">Điện gia dụng</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Sản phẩm khác</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Máy giặt, máy sấy</a>
                </li>
                <li class="border-bottom">
                    <a href="path.html">Bình nóng lạnh, máy lọc nước</a>
                </li>
                <li class="border-bottom"><a href="path.html">Tủ lạnh</a></li>
                <li class="border-bottom"><a href="news.html">Tin tức</a></li>
            </ul>
        </div>

        <div
            class="navbar-mobile-option position-fixed"
            id="mobile-search-main"
        >
            <div class="navbar-mobile-option-title position-relative">
                <form action="#" class="d-flex">
                    <input type="text" placeholder="Tìm kiếm ..." />
                    <div
                        class="search d-flex align-items-center justify-content-around"
                    >
                        <span class="lnr lnr-magnifier"></span>
                    </div>
                </form>
            </div>
        </div>
        <div
            class="navbar-mobile-option position-fixed cart"
            id="mobile-cart-main"
        >
            <div class="navbar-mobile-option-title position-relative">
                <h3>Giỏ hàng</h3>
                <a href="#" class="position-absolute">
                    <span class="lnr lnr-cross yellow-hover btn-cart"></span>
                </a>
            </div>
            <ul
                class="navbar-mobile-option-list cart-list-product border-bottom position-relative"
            >
                <li class="d-flex product-cart">
                    <img
                        src="./images/products/ps_cate_icon_1646387457_331.jpg"
                        alt=""
                    />
                    <div class="detail">
                        <a href="product-detail.html"
                            >Máy giặt Aqua 8 kg AQW-KS80GT S lồng đứng
                        </a>
                        <p>1 x 4,500,000₫</p>
                    </div>
                    <a href="#" class="position-absolute delete">
                        <span
                            class="lnr lnr-cross yellow-hover btn-cart"
                        ></span>
                    </a>
                </li>
            </ul>
            <div class="cart-action">
                <div class="sum-money d-flex justify-content-between">
                    <p>Tổng:</p>
                    <p>4.500.000đ</p>
                </div>
                <div class="btn-cart d-flex justify-content-between">
                    <div class="btn btn-danger">Giỏ hàng</div>
                    <div class="btn btn-danger">Thanh Toán</div>
                </div>
            </div>
        </div>
        <!-- JS -->
        <script src="../js/mobile_nav.js"></script>
    </body>
</html>
