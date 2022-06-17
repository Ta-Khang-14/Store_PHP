<!DOCTYPE html>
<html lang="en">
<?php include('header_store.php')?>
<body>
<?php include("navbar.php")?>
<div class="gray-bg">
            <form class="login form-log active">
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
                <br />
                <a href="#" class="my-2"> Quên mật khẩu?</a>
                <br />

                <input
                    required
                    type="submit"
                    value="Đăng nhập"
                    class="btn btn-danger my-2 mt-3"
                />
                <a href="#" class="my-2 mt-3 dangki"> Đăng kí</a>
            </form>
            <form class="register form-log" method="../../../register.php" method="POST" enctype="multipart/form-data">
                <h3 class="text-center">Đăng kí</h3>
                <p>Đăng kí tài khoản của bạn</p>
                <input
                    required
                    type="text"
                    name="name"
                    id="3"
                    placeholder="Name"
                    class="my-2 p-2 input-text"
                />
                <input
                    required
                    type="email"
                    name="email"
                    id="4"
                    placeholder="Email"
                    class="my-2 p-2 input-text"
                />
                <br />
                <input
                    required
                    type="password"
                    name="password"
                    id="5"
                    placeholder="Password"
                    class="my-2 p-2 input-text"
                />
                <br />
                <input
                    type="submit"
                    value="Đăng kí"
                    class="btn btn-danger my-2 mt-3"
                />
                <a href="#" class="my-2 mt-3 dangki"> Đăng nhập</a>
            </form>
            <script>
                $(".dangki").on("click", (e) => {
                    $(".login").toggleClass("active");
                    $(".register").toggleClass("active");
                });
            </script>
        </div>
        <?php include("footer.php")?>
        <?php include("mobile_nav.php")?>
    </body>
</html>