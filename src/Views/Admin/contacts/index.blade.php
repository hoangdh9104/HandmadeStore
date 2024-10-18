@extends('layouts.master')

@section('title')
    Danh sách Liên hệ
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách Liên hệ</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người liên hệ</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Nội dung</th>
                                    <th>Ngày gửi</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td><?= $stt++ ?></td>
                                        <td><?= $contact['name'] ?></td>
                                        <td><?= $contact['phone'] ?></td>
                                        <td><?= $contact['address'] ?></td>
                                        <td><?= $contact['content'] ?></td>
                                        <td><?= $contact['created_at'] ?></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url('admin/contacts/' . $contact['id'] . '/show') }}">Xem</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
