        <?php 
            include_once("../MySQL/dbprocess.php"); 
            $sql = "SELECT * FROM category";

            $result = execute($sql);
            $countProduct = 0;
            if(isset($_SESSION['infor'])) {

                $email = $_SESSION['infor']['email'];
                if(!isset($_SESSION['infor']['id'])) {
                    $sql2 = "SELECT * FROM account WHERE email = '$email'";
                    $idUser= executeResult( $sql2)[0]['id'];
                } else {
                    $idUser = $_SESSION['infor']['id'];
                }

                $sql = "SELECT count(*) as SL FROM account INNER JOIN cart ON account.id = cart.idUser
                    INNER JOIN cart_detail ON cart.id = cart_detail.idCart WHERE idUser='$idUser'";
                $countProduct += executeResult($sql)[0]['SL'];
            }
            
            
        ?>
        <!-- HEADER -->
        <div class="header position-sticky">
            <div class="container nav-custom">
                <div
                    class="nav nav-sticky d-flex justify-content-between align-items-center"
                >
                    <!-- NAVBAR BRAND -->
                    <div class="navbar-brand py-0">
                        <a href="index.php">
                            <img
                                src="../images/logo_1646461670_logo-01.png"
                                alt="#"
                            />
                        </a>
                    </div>

                    <!-- NAVBAR SEARCH -->
                    <div class="navbar-search">
                        <form action="" class="d-flex position-relative">
                            <input
                                class="form-control"
                                type="search"
                                placeholder="Tìm kiếm..."
                                aria-label="Search"
                                id="search-input"
                            />

                            <input
                                type="submit"
                                value="Search"
                                class="form-control w-30"
                                id="search-sumbit"
                            />
                        </form>
                    </div>

                    <!-- NAVBAR USER -->
                    <div class="navbar-user">
                        <div
                            class="navbar-user-content d-flex align-items-center"
                        >
                            <a
                                href="#"
                                class="nav-favorite-product white-letter position-relative"
                            >
                                <i class="fa-solid fa-heart nav-icon"></i>
                                <span class="sub-num position-absolute">0</span>
                            </a>
                            <div class="nav-user-cart position-relative">
                                <a href="cart_ui.php" class="white-letter">
                                    <i
                                        class="fa-solid fa-basket-shopping nav-icon"
                                    ></i>
                                </a>
                                <span class="sub-num position-absolute"><?=$countProduct?></span>
                            </div>
                            <div class="nav-login d-flex align-items-center">
                                <div class="nav-login-icon white-letter">
                                    <i class="fa-solid fa-user nav-icon"></i>
                                </div>

                                <!-- PHP  -->
                                <?php
                                    if(!empty($_SESSION['infor'])) {
                                        echo "<div class='nav-login-link pl-2'>
                                                <a
                                                    href='me.php'
                                                    class='d-block nav-link-register white-letter'
                                                    >".$_SESSION['infor']['name']."</a
                                                >
                                            </div>";
                                    } else {
                                        echo '<div class="nav-login-link pl-2">
                                                <a
                                                    href="register_ui.php"
                                                    class="d-block nav-link-register white-letter"
                                                    >Đăng kí</a
                                                >
                                                <a
                                                    href="login_ui.php"
                                                    class="d-block nav-link-login white-letter"
                                                    >Đăng nhập</a
                                                >
                                            </div>';
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-menu">
                    <ul
                        class="nav-menu-list d-flex justify-content-between pl-0 align-items-center"
                    >
                    <?php 
                        foreach($result as $item) {
                            echo '
                                <li class="nav-menu-item">
                                    <a class="white-letter" href="./product_ui.php?idCategory='.$item['id'].'">'.$item['name'].'</a>
                                </li>';
                        }
                    ?>
                    </ul>
                </div>
            </div>
        </div>