@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px">
                <?php
                        $message = Session::get('message');
                        if ($message) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon align-middle">
                        <span class="material-icons text-md">
                            thumb_up_off_alt
                        </span>
                    </span>
                    <span class="alert-text"><strong><?php echo $message; ?></strong> </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                            Session::put('message', null);
                        }
                        ?>
                <header
                    class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ route('save-brand') }} method="POST">
                            @csrf
                            <div class="input-group input-group-static">
                                <label>Tên thương hiệu</label>
                                <input type="text" class="form-control" name="brand_name">
                            </div>
                            @error('brand_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div>
                                <label class="mt-4" style="margin-left: 0">Mô tả thương hiệu</label>
                                <div class="input-group input-group-dynamic">
                                    <textarea id="ckeditor" class="form-control" rows="5" placeholder="Mô tả thương hiệu." spellcheck="false" name="brand_desc"></textarea>
                                </div>
                                @error('brand_desc')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                <select name="brand_status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                name="add_brand" style="margin: 0 auto">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
