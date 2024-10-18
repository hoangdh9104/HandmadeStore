@extends('layouts.master')

@section('title')
Thêm người dùng mới
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Thêm mới người dùng</h1>
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
                    <form class="mx-1 mx-md-4" action="{{ url('admin/users/store') }}" enctype="multipart/form-data" method="POST">

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="name">Họ tên:</label>
                                <input type="text" id="name" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label for="avatar" class="form-label">Ảnh đại diện:</label>
                                <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="password">Mật khẩu:</label>
                                <input type="password" id="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                <label class="form-label" for="confirm_password">Nhập lại mật khẩu:</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <select class="form-select" aria-label="Default select example" name="type" id="type">
                                <option selected>Chọn chức vụ</option>
                                <option value="admin" name="type" id="type">Admin</option>
                                <option value="member" name="type" id="type">Member</option>
                            </select>
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