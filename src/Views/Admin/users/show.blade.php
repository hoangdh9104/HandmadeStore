@extends('layouts.master')

@section('title')
Chi tiết tài khoản - {{ $user['email'] }}
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Chi tiết tài khoản - {{ $user['email'] }}</h1>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="{{ url('admin/users') }}">Trở về trang danh sách</a>
            <div class="table-responsive">
                <table class="table table-striped" style="font-size: 17px">
                    <thead>
                        <tr>
                            <th>Trường</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user as $field => $value)
                        <tr>
                            <td>{{ $field }}</td>
                            <td>
                                @if ($field === 'avatar')
                                <img src="{{ asset($value) }}" alt="user Image" style="max-width: 100px;">
                                @else
                                {{ $value }}
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection