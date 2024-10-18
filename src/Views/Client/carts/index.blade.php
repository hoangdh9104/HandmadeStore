@extends('layouts.master')

@section('title')
    Giỏ hàng
@endsection

@section('content')
    <style>
        .table-cart table {
            border: #888 1px solid;
            padding: 10px 30px;
            border-radius: 10% 0 0 10%;
        }

        .table-cart table tr,
        th,
        td {
            padding: 20px 20px;
            text-align: center;
        }
    </style>
    <div id="main">
        <div class="text_cart">
            <p>HOME</p>
            <i class='bx bx-chevron-right'></i>
            <p>Shoping Cart</p>
        </div>
        <div class="style"></div>
        <br>
        <h1>Giỏ hàng:</h1>
        <div class="item-cart">

            <div class="table-cart" data-aos="zoom-out-right">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Xóa</th>
                        </tr>
                        @if (isset($_SESSION['cart']))
                            @php
                                $cart = $_SESSION['cart'] ?? $_SESSION['cart-' . $_SESSION['user']['id']];
                            @endphp
                            @foreach ($cart as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item['img_thumbnail']) }}" width="100px" alt="">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        {{ $item['price_sale'] ?: $item['price_regular'] }}
                                    </td>
                                    <td>
                                        @php
                                            $url = url('cart/quantityDec') . '?productID=' . $item['id'];

                                            if (
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                            ) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-danger" style="font-size: 12px"
                                            href="{{ $url }}">Giảm</a>

                                        {{ $item['quantity'] }}

                                        @php
                                            $url = url('cart/quantityInc') . '?productID=' . $item['id'];

                                            if (
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                            ) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-primary" style="font-size: 12px"
                                            href="{{ $url }}">Tăng</a>
                                    </td>
                                    <td>
                                        {{ $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']) }}
                                    </td>
                                    <td>
                                        @php
                                            $url = url('cart/remove') . '?productID=' . $item['id'];

                                            if (
                                                isset($_SESSION['User']) &&
                                                isset($_SESSION['cart-' . $_SESSION['user']['id']])
                                            ) {
                                                $url .= '&cartID=' . $_SESSION['cart_id'];
                                            }
                                        @endphp
                                        <a class="btn btn-danger" style="font-size: 12px"
                                            onclick="return confirm('Có chắn không?')" href="{{ $url }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="cart-total" data-aos="zoom-out-left">
                <form action="{{ url('order/checkout') }}" method="POST">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Họ tên:</label>
                        <input type="text" class="form-control" id="name"
                            value="{{ $_SESSION['user']['name'] ?? null }}" placeholder="Enter name" name="user_name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email"
                            value="{{ $_SESSION['user']['email'] ?? null }}" placeholder="Enter email" name="user_email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" id="phone"
                            value="{{ $_SESSION['user']['phone'] ?? null }}" placeholder="Enter phone" name="user_phone">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" id="address"
                            value="{{ $_SESSION['user']['address'] ?? null }}" placeholder="Enter address"
                            name="user_address">
                    </div>

                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

        </div>

    </div>
@endsection
