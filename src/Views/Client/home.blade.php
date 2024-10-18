@extends('layouts.master')

@section('title')
    HomePage
@endsection

@section('content')
    <div class="slider">

        <div class="title-slider">
            <div class="text-animation">
                <h5>Men Collection 2024</h5>
                <h3>NEW ARRIVALS</h3>
                <a href="{{ url('product')}}" class="text-light"><button>SHOP NOW</button></a>
            </div>
        </div>

    </div>
    <div class="background">
        <img src="{{ asset('assets/client/src/img/slide1.webp') }}" alt="">
    </div>
    <div id="main">

        <div id="content" class="home-content">
            @for ($i = 0; $i < 3; $i++)
                @if (isset($categories[$i]))
                    @php $category = $categories[$i]; @endphp
                    <div data-aos="fade-left" class="content-text-img">
                        <div class="content-img">
                            <img id="image1" src="{{ asset($category['img_thumbnail']) }}" alt="">
                        </div>
                        <div class="text-content">
                            <div class="text-content-1">
                                <h2>{{ $category['name'] }}</h2>
                            </div>
                            <div class="content-text-2">
                                <a href="{{ url('categories/' . $category['id']) }}">
                                    <h3>Shop Now</h3>
                                </a>
                                <span></span>
                            </div>
                        </div>
                    </div>
                @endif
            @endfor
        </div>


    </div>

    <div class="product">
        <div class="text-product">
            <h3>Product Overview</h3>
            <div class="menu-filter-product">
                <div class="menu-product">
                    <ul>
                        @foreach ($categories as $category)
                            <!-- Chưa truyền dữ liệu detail cho category -->
                            <li><a href="{{ url('categories/' . $category['id']) }}">{{ $category['name'] }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div class="filter-product">
                    <div class="filter">
                        <i class='bx bx-filter'></i> <span>Filter</span>
                    </div>
                    <div class="search-filter-product">
                        <i class='bx bx-search-alt-2'></i><span>Search</span>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!function_exists('currency_format')) {
            function currency_format($number, $suffix = 'đ')
            {
                if (!empty($number)) {
                    return number_format($number, 0, ',', '.') . "{$suffix}";
                }
            }
        }
        ?>
        <div class="image-product">
            @foreach ($products as $product)
                <div class="item-image-product" data-aos="fade-up">
                    <div class="test">
                        <!-- test link ảnh tạm thời -->
                        <a href="{{ url('product/' . $product['id']) . '/show' }}"><img src="{{ asset($product['img_thumbnail']) }}"
                                width="280px" height="300px" alt=""></a>
                    </div>
                    <p><a onclick="showProduct()"
                            href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}">Thêm vào giỏ hàng</a>
                    </p>
                    <div class="name-item-image-product">
                        <div class="price-name-item-image-product">
                            <p><a href="{{ url('product/' . $product['id']) . '/show' }}">{{ $product['name'] }}</a></p>
                            <p><?php echo currency_format($product['price_regular'], 'đ'); ?></p>
                        </div>
                        <div class="heart-name-item-image-product">
                            <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <nav aria-label="Page navigation example">
        <?php
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $prevPage = $currentPage > 1 ? $currentPage - 1 : 1;
        $nextPage = $currentPage < $totalPage ? $currentPage + 1 : $totalPage;
        ?>
        <ul class="pagination justify-content-center">
            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                <a class="page-link" href="?page={{ $prevPage }}" tabindex="-1">Previous</a>
            </li>

            @for ($page = 1; $page <= $totalPage; $page++)
                @if ($page == $currentPage)
                    <li class="page-item active">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                    </li>
                @endif
            @endfor
            <li class="page-item {{ $currentPage == $totalPage ? 'disabled' : '' }}">
                <a class="page-link" href="?page={{ $nextPage }}">Next</a>
            </li>
        </ul>
    </nav>


    <div class="btn-product">
        <a href="{{ url('product') }}">LOAD MORE</a>
    </div>
    </div>

    </div>
@endsection
