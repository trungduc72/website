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
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ route('save-category-product') }} method="POST">
                            @csrf
                            <div class="input-group input-group-static">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="category_product_name">
                            </div>
                            @error('category_product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div>
                                <label class="mt-4" style="margin-left: 0">Mô tả danh mục</label>
                                <div class="input-group input-group-dynamic">
                                    <textarea class="form-control" rows="5" placeholder="Mô tả danh mục." spellcheck="false"
                                        name="category_product_desc"></textarea>
                                </div>
                            </div>
                            @error('category_product_desc')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                <select name="category_product_status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                name="add_category_product" style="margin: 0 auto">Thêm</button>
                        </form>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
