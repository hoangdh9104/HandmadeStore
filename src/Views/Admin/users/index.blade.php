@extends('layouts.master')

@section('title')
    Danh sách User
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách User</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a class="btn btn-primary" href="{{ url('admin/users/create') }}">Thêm mới</a>

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
                                    <th>Ảnh</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Chức vụ</th>
                                    <th>Ngày thêm</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($users as $user)
                                    <tr>
                                        <td><?= $stt++ ?></td>
                                        <td>
                                            <img src="{{ asset($user['avatar']) }}" alt="" width="100px">
                                        </td>
                                        <td><?= $user['name'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['type'] ?></td>
                                        <td><?= $user['created_at'] ?></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url('admin/users/' . $user['id'] . '/show') }}">Xem</a>
                                            <a class="btn btn-warning"
                                                href="{{ url('admin/users/' . $user['id'] . '/edit') }}">Sửa</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('admin/users/' . $user['id'] . '/delete') }}"
                                                onclick="return confirm('Chắc chắn xóa không?')">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                @if ($totalPage > 1)
                                    <div class="d-flex justify-content-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                @if ($page > 1)
                                                    <li class="page-item">
                                                        <a class="page-link linkm"
                                                            href="{{ url('admin/users') }}?page={{ $page - 1 }}">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <?php for ($i = 1; $i <= $totalPage; $i++) : ?>

                                                <li class="page-item"><a class="page-link linkm"
                                                        href="{{ url('admin/users') }}?page={{ $i }}">
                                                        <?= $i ?>
                                                    </a>
                                                </li>

                                                <?php endfor ?>

                                                <?php if ($page < $totalPage) : ?>

                                                <li class="page-item">
                                                    <a class="page-link linkm"
                                                        href="{{ url('admin/users') }}?page={{ $page + 1 }}">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>

                                                <?php endif ?>
                                            </ul>
                                        </nav>
                                    </div>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
