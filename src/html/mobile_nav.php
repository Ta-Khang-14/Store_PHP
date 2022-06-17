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