@extends('layouts.master')

@section('title')
Cập nhật sản phẩm : {{ $prduct['name'] }}
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Cập nhật sản phẩm : {{ $prduct['name'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">

                @if (!empty($_SESSION['errors']))
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($_SESSION['errors'] as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    @php
                    unset($_SESSION['errors']);
                    @endphp
                </div>
                @endif

                <div class="table-responsive">
                    <form class="mx-1 mx-md-4" action="{{ url('admin/products/' . $product['id'] . '/update') }}" enctype="multipart/form-data" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Tên sản phẩm:</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $product['name'] }}" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id" value="{{ $categories['c_name'] }}">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label for="img_thumbnail" class="form-label">Ảnh sản phẩm:</label>
                                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail" name="img_thumbnail">
                                <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_regular">Giá sản phẩm:</label>
                                <input type="number" id="price_regular" name="price_regular" class="form-control" value="{{ $product['price_regular'] }}" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_sale">Giá khuyến mãi:</label>
                                <input type="number" id="price_sale" name="price_sale" class="form-control" value="{{ $product['price_sale'] }}" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="overview">Mô tả:</label>
                                <textarea type="text" id="overview" name="overview" class="form-control" value="{{ $product['overview'] }}"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="content">Chi tiết:</label>
                                <textarea type="text" id="content" name="content" class="form-control" value="{{ $product['content'] }}"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Cập nhật</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection