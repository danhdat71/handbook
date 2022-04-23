@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý các trang</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <form class="wrap-box-file" id="wrap-box-file">
                        Tải trang lên
                        <input type="file" name="images[]" multiple>
                        <div class="loading"></div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Danh sách các trang hiện có</div>
                        <div class="card-body">
                            <table id="main-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="image">Ảnh</th>
                                        <th>Timestamps</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                <div class="wrap-img">
                                                    <img src="{{ $item->slider_image }}" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div>{{ $item->created_at }}</div>
                                                <div>{{ $item->updated_at }}</div>
                                            </td>
                                            <td>
                                                <a href="delete-page/{{ $item->id }}"
                                                    class="btn btn-sm btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
