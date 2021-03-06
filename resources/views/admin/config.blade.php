@extends('admin.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tùy chỉnh</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="pb-3">Media</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                Chọn ảnh nền
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" enctype="multipart/form-data"
                                                    id="form-background" class="wrap-image-bg">
                                                    <div class="load-frame load-frame-background d-none">
                                                        <div class="percen">0</div>
                                                        <div class="load-bar">
                                                            <span class="progress-bar"></span>
                                                        </div>
                                                    </div>
                                                    <input class="input-image change-background" type="file"
                                                        name="background" accept="image/*">
                                                    <img class="preview-image"
                                                        src="@if (isset($config->background)) {{ $config->background }}
                                                        @else
                                                        {{ 'image/fixed/bg_eximage.jpg' }} @endif"
                                                        accept="image/*">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                Chọn nhạc nền
                                            </div>
                                            <div class="card-body">
                                                <form class="wrap-sound-bg" id="wrap-sound-bg">
                                                    <div class="load-frame load-frame-sound d-none">
                                                        <div class="percen"></div>
                                                        <div class="load-bar">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                    <div class="wrap-input">
                                                        Upload nhạc mới
                                                        <input name="background_sound" class="input-sound" type="file"
                                                            accept="audio/*">
                                                    </div>
                                                    <audio class="control-audio" src="{{ $config->background_sound }}"
                                                        controls></audio>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-config">
                                    <div class="col-12">
                                        <h4 class="pb-3 pt-4">Cấu hình</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Kích thước</div>
                                            <div class="card-body">
                                                <form class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="" id="">Chiều rộng</label>
                                                            <input name="book_width" id="book_width" type="text"
                                                                class="form-control" value="{{ $config->book_width }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="" id="">Chiều cao</label>
                                                            <input name="book_height" id="book_height" type="text"
                                                                class="form-control" value="{{ $config->book_height }}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Tốc độ nhảy</div>
                                            <form class="card-body">
                                                <div class="form-group">
                                                    <label for="">Tốc độ chuyển trang</label>
                                                    <input type="text" class="form-control" name="speed"
                                                        value="{{ $config->speed }}">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Hiệu ứng bóng</div>
                                            <form class="card-body">
                                                <div class="form-group">
                                                    <label for="">Chọn hiện bóng</label>
                                                    <select name="is_gradient" id="" class="form-control">
                                                        <option value="1"
                                                            @if ($config->is_gradient == true) {{ 'selected' }} @endif>
                                                            Hiện</option>
                                                        <option value="0"
                                                            @if ($config->is_gradient == false) {{ 'selected' }} @endif>Ẩn
                                                        </option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">Thông tin</div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="">Tiêu đề</label>
                                                    <input class="form-control" name="title" type="text"
                                                        value="{{ $config->title }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Mô tả</label>
                                                    <input class="form-control" name="description" type="text"
                                                        value="{{ $config->description }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Link website</label>
                                                    <input class="form-control" name="website" type="text"
                                                        value="{{ $config->website }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Số điện thoại</label>
                                                    <input class="form-control" name="phone" type="text"
                                                        value="{{ $config->phone }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

        <div class="modal fade" id="add">
            <div class="modal-dialog" style="max-width: 1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        Tạo slider
                    </div>
                    <form enctype="multipart/form-data" id="form-slider-upload" class="modal-body">
                        <div class="form-group">
                            <label for="">Đường dẫn</label>
                            <input type="text" class="form-control" name="url">
                            <p class="text-danger url validate-msg"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn ảnh</label>
                            <p class="text-danger image validate-msg"></p>
                            <div class="input-file-1">
                                <input id="image" type="file" name="image" class="input-image" accept="image/*">
                                <img class="preview-image" src="" alt="">
                                <div class="icon"><i class="fas fa-image"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="1">Hiện sau khi lưu</option>
                                <option value="0">Ẩn sau khi lưu</option>
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <div class="row w-100 align-center">
                            <div class="col-lg-10">
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 0%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button id="upload-slider" type="button" class="btn bg-orange btn-block">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="edit">
            <div class="modal-dialog" style="max-width: 1000px">
                <div class="modal-content">
                    <div class="modal-header">
                        Update slider
                    </div>
                    <form enctype="multipart/form-data" id="form-slider-update" class="modal-body">
                        <input type="hidden" id="slider-id" name="id">
                        <div class="form-group">
                            <label for="">Đường dẫn</label>
                            <input type="text" class="form-control url" name="url">
                            <p class="text-danger url validate-msg"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn ảnh</label>
                            <p class="text-danger image validate-msg"></p>
                            <div class="input-file-1">
                                <input id="image" type="file" name="image" class="input-image" accept="image/*">
                                <img class="preview-image" src="" alt="">
                                <div class="icon"><i class="fas fa-image"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control status">
                                <option value="1">Hiện sau khi lưu</option>
                                <option value="0">Ẩn sau khi lưu</option>
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <div class="row w-100 align-center">
                            <div class="col-lg-10">
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: 0%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button id="update-slider" type="button" class="btn bg-orange btn-block">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
