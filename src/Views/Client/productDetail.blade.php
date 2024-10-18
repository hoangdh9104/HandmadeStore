@extends('layouts.master')

@section('title')
    Product-list
@endsection

@section('content')
    {{-- <div id="appp" > </div> --}}
    <div class="container ">
        <div class="grid border detail">
            <div class="grid-left">
                <img src="{{ asset($product['img_thumbnail']) }}" width="80%" alt="">
            </div>
            <div class="grid-mid">
                <div class="img">
                    <img id="img" src="{{ asset($product['img_thumbnail']) }}" width="100%" alt="">
                </div>
                <div class="icon-next-pre">
                    <i class='bx bx-exit-fullscreen'></i>
                    <div class="next-pre">
                        <i class='bx bx-chevron-left' onclick="pre()"></i>
                        <i class='bx bx-chevron-right' onclick="next()"></i>
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
            <div class="grid-right">
                <h4>{{ $product['name'] }}</h4>
                <p><?php echo currency_format($product['price_regular'], 'đ'); ?></p>
                <p style='white-space: pre-line;'>{{ $product['overview'] }}</p>
                <a href="{{ url('cart/add') }}?quantity=1&productID={{ $product['id'] }}" class="btn btn-primary"
                    id="to-cart">Add to
                    cart</a>
            </div>

        </div>
        <div class="grid-right grid-product-detail">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Chi tiết sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product['name'] }}</li>
                </ol>
            </nav>
            <div>
                <p class="mb-0" id="main-content" style='white-space: pre-line;'>{{ $product['content'] }}</p>
            </div>
        </div>
        <script src="src/js/product.js"></script>
    </div>
@endsection
