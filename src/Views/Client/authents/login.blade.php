<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @include('layouts.partials.head')
    <title>Đăng nhập</title>

<body class="animsition">

    <!-- Header -->
    <div id="header">

        <div class="header-top">
            <div class="sub-header-top">
                <div class="left-title">
                    <h4>Website designed by Manh Cuong</h4>
                </div>
                <div class="list-header">
                    <ul>
                        <li><a href=""> Help & FAQs</a></li>
                        <li><a href=""> My Account</a></li>
                        <li><a href=""> EN</a></li>
                        <li><a href=""> USD</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="sub-nav" id="nav" style="background: transparent; padding: 16px 0px 26px; box-shadow: none;">
            <div class="nav">
                <div class="photo-logo">
                    <a href="{{ asset('') }}"><img src="{{ asset('assets/client/src/img/logo.webp') }}" style="cursor: pointer;" alt="" /></a>
                </div>
                <!-- dùng thẻ nav -->
                <nav>
                    <div class="list-menu">
                        <ul>
                            <li><a href="{{ asset('/') }}" id="home"> Trang chủ</a></li>
                            <li><a href="{{ asset('product') }}">Danh sách sản phẩm</a></li>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="{{ asset('contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="list-icon" id="list-icon">
                    <div class="icons search" id="iconSearch">
                        <input type="text" id="input_search" placeholder="New Product..?">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="icons cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="toggle">
                        <i class='bx bx-sun'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main -->
    <div id="main">
        <div class="SignIn container">
            <form action="{{ url('login/handle-login') }}" method="POST">
                <div class="form-SignIn">
                    <div class="left-form-Sign-In">

                        <div class="inpt-form-sign-in">
                            <label for="" name="email">Emmail :</label><br>
                            <input type="text" id="email" name="email" placeholder="Enter your Email ">
                            <span class="error-email"></span>
                        </div>
                        <div class="inpt-form-sign-in">
                            <label for="" name="password">Password :</label><br>
                            <input type="password" id="password" name="password" placeholder="Enter your Password ">
                        </div>
                        <div class="btn-signIn">
                            <div class="left-btn-signIn">
                                <p>Do not have an account ?</p> <a href="{{ url('register') }}"> Sing Up</a>
                            </div>
                            <div class="right-btn-signnIn">
                                <button type="submit">Sign In</button>
                            </div>
                        </div>
                    </div>
                    <div class="right-form-SignIn">
                        <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/original/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg" width="70%" alt="">
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- Footer -->
    <div id="footer">
        <div class="text-footer">
            <div class="cate">
                <h3>CATEGORIES</h3>
                <p><a href="">Women</a></p>
                <p><a href="">Men</a></p>
                <p><a href="">Shoes</a></p>
                <p><a href="">Watches</a></p>
            </div>
            <div class="help">
                <h3>HELP</h3>
                <p><a href="">Track Order</a></p>
                <p><a href="">Returns</a></p>
                <p><a href="">Shipping</a></p>
                <p><a href="">FAQs</a></p>
            </div>
            <div class="touch">
                <h3>GET IN TOUCH</h3>
                <p>Any questions? Let us know in store at 8th floor,Vu Binh, Kien Xuong,Thai Binh, NY 10018 or call
                    us
                    on
                    (+84) 968 68 68 68</p>
                <p>
                    <i class='bx bxl-facebook'></i>
                    <i class='bx bxl-instagram'></i>
                    <i class='bx bxl-twitter'></i>
                </p>
            </div>
            <div class="mail">
                <h3>NEWSLETTER</h3>

                <div class="input-mail">

                    <input type="email" placeholder="email@example.com">
                    <span></span>
                </div>

                <p><a href="">SUBSCRIBE</a></p>

            </div>
        </div>

        <div class="local-footer">
            <div class="image-logo-footer">
                <img src="{{ asset('assets/client/src/img/ft1.webp') }}" alt="">
                <img src="{{ asset('assets/client/src/img/ft2.webp') }}" alt="">
                <img src="{{ asset('assets/client/src/img/ft3.webp') }}" alt="">
                <img src="{{ asset('assets/client/src/img/ft4.webp') }}" alt="">
                <img src="{{ asset('assets/client/src/img/ft5.webp') }}" alt="">
            </div>
            <div class="text-local-footer">
                <p>Copyright ©2022 All rights reserved | This template is made with <i class='bx bx-heart'></i> by
                    <span style="color: #007bff;cursor: pointer;">Cường đẹp trai vkl</span>
                </p>
            </div>
        </div>

        <div class="back-footer">
            <a href="#"><i class='bx bx-arrow-to-top bx-fade-up'></i></a>
        </div>
    </div>

    <!-- Script -->
    @include('layouts.partials.script')
</body>

</html>