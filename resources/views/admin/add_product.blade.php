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
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ route('save-product') }} method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-static">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            @error('product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-static mt-4">
                                <label>Giá sản phẩm</label>
                                <input type="number" min="1" class="form-control" name="product_price">
                            </div>
                            @error('product_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-static mt-4 mb-4">
                                <label>Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="product_image">
                            </div>
                            <label style="margin-left: 0">Mô tả sản phẩm</label>
                            <div class="input-group input-group-dynamic">
                                <textarea class="form-control" rows="5" placeholder="Mô tả sản phẩm." spellcheck="false" name="product_desc"></textarea>
                            </div>
                            @error('product_desc')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="mt-4">
                                <label style="margin-left: 0">Nội dung sản phẩm</label>
                                <div class="input-group input-group-dynamic">
                                    <textarea class="form-control" rows="5" placeholder="Nội dung sản phẩm." spellcheck="false"
                                        name="product_content"></textarea>
                                </div>
                            </div>
                            @error('product_content')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($cate_product as $item)
                                        <option value={{ $item->category_id }}> {{ $item->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Thương hiệu</label>
                                <select name="product_brand" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($brand_product as $item)
                                        <option value={{ $item->brand_id }}> {{ $item->brand_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                <select name="product_status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                name="add_product" style="margin: 0 auto">Thêm sản phẩm</button>
                        </form>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span style = "color: green">' . $message . '</span> ';
                            Session::put('message', null);
                        }
                        ?>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
