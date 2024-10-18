<header>

    <div id="header">
        <div class="header-top">
            <div class="sub-header-top">
                <div class="left-title">
                    <h4>Website designed by student of DucTV4</h4>
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
        <div class="sub-nav" id="nav"
            style="background-color: rgb(255, 255, 255); top: 0px; padding: 10px 0px 5px; box-shadow: gray 0px 2px 10px;">
            <div class="nav">
                <div class="photo-logo">
                    <a href="{{ asset('') }}"><img src="{{ asset('assets/client/src/img/logo.webp') }}"
                            style="cursor: pointer;" alt="" /></a>
                </div>
                <!-- dùng thẻ nav -->
                <nav>
                    <div class="list-menu">
                        <ul>
                            <li>
                                <a href="{{ asset('') }}" id="home"> Home</a>
                            </li>
                            <li><a href="{{ url('product') }}">Shop</a></li>
                            <li><a href="features.html">Features</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="{{ url('about') }}">About</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="list-icon" id="list-icon">
                    <div class="icons search" id="iconSearch">

                        <input type="text" id="input_search" placeholder="New Product..?">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="icons cart">
                        <a href="{{ url('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <div class="toggle">
                        @if (!isset($_SESSION['user']))
                            <a href="{{ url('login') }}" style="font-size: 20px;">Đăng nhập</a>
                        @endif
                        @if (isset($_SESSION['user']))
                            <a href="{{ url('logout') }}" style="font-size: 20px;">Đăng xuất</a>
                        @endif
                    </div>
                </div>
            </div>



        </div>



    </div>

</header>
