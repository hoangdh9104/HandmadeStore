@extends('layouts.master')

@section('title')
Thêm mới sản phẩm
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Thêm mới sản phẩm</h1>
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
                    <form class="mx-1 mx-md-4" action="{{ url('admin/products/store') }}" enctype="multipart/form-data" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Tên sản phẩm:</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="category_id">Danh mục sản phẩm:</label>
                                <select class="form-select" name="category_id" id="category_id">
                                    <option value="">-- Chọn danh mục --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label for="img_thumbnail" class="form-label">Ảnh sản phẩm:</label>
                                <input type="file" class="form-control" id="img_thumbnail" placeholder="Enter img_thumbnail" name="img_thumbnail">
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_regular">Giá sản phẩm:</label>
                                <input type="number" id="price_regular" name="price_regular" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="price_sale">Giá khuyến mãi:</label>
                                <input type="number" id="price_sale" name="price_sale" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="overview">Mô tả sản phẩm:</label>
                                <textarea name="overview" id="overview" placeholder="" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="content">Chi tiết:</label>
                                <textarea name="content" id="content" placeholder="" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Thêm mới</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection