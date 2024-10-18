@extends('layouts.master')

@section('title')
    Product-list
@endsection

@section('content')
    <div id="main">

        <div class="product">

            <div class="text-product">
                <div class="menu-filter-product">
                    <div class="menu-product">
                        <ul>
                            @foreach ($categories as $category)
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
            @foreach ($products as $product)
                <div class="image-product">
                    <div class="item-image-product" data-aos="fade-up">
                        <div class="test">
                            <img src="{{ asset($product['img_thumbnail']) }}" width="100%" alt="">
                        </div>
                        <p><a onclick="showProduct()" href="{{ url('product/' . $product['id']) . '/show' }}">Quick View</a>
                        </p>
                        <div class="name-item-image-product">
                            <div class="price-name-item-image-product">
                                <p><a href="{{ url('product/' . $product['id']) }}">{{ $product['name'] }}</a></p>
                                <p><?php echo currency_format($product['price_regular'], 'đ'); ?></p>
                            </div>
                            <div class="heart-name-item-image-product">

                                <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
                            </div>

                        </div>

                    </div>

                </div>
            @endforeach
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


        </div>

    </div>
@endsection
