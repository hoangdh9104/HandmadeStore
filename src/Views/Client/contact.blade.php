@extends('layouts.master')

@section('tilte')
    Liên hệ
@endsection

@section('content')
    <div id="main">
        <div class="banner">
            <div class="text-banner">
                <h1>Contact</h1>
            </div>

        </div>

        <div class="SignIn">
            <div class="error">
                @if (isset($_SESSION['status']) && $_SESSION['status'])
                    <div class="alert alert-success">
                        {{ $_SESSION['msg'] }}
                    </div>

                    @php
                        unset($_SESSION['status']);
                        unset($_SESSION['msg']);
                    @endphp
                @endif
            </div>
            <div class="form-SignIn">
                <div class="left-form-Sign-In">
                    <form action="{{ url('contact/store') }}" method="POST">
                        <div class="inpt-form-sign-in">
                            <p>Họ tên:</p>
                            <input type="text" name="name" id="name" placeholder="Enter your name ">
                        </div>
                        <div class="inpt-form-sign-in">
                            <p>Số điện thoại:</p>
                            <input type="number" name="phone" id="phone" placeholder="Enter your phone ">
                        </div>
                        <div class="inpt-form-sign-in">
                            <p>Địa chỉ :</p>
                            <input type="text" name="address" id="address" placeholder="Enter your address ">
                        </div>
                        <div class="inpt-form-sign-in">
                            <p>Vấn đề cần liên hệ :</p>
                            <input type="text" name="content" id="content" placeholder="">
                        </div>

                        <div class="btn-signIn">
                            <div class="right-btn-signnIn">
                                <button type="submit">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
