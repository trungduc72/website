@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px">
                <header class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ route('save-product') }} method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-static mb-4">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" name="product_price">
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label>Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" name="product_image">
                            </div>
                            <label style="margin-left: 0">Mô tả sản phẩm</label>
                            <div class="input-group input-group-dynamic mb-4">
                                <textarea class="form-control" rows="5" placeholder="Mô tả sản phẩm." spellcheck="false" name="product_desc"></textarea>
                            </div>
                            <label style="margin-left: 0">Nội dung sản phẩm</label>
                            <div class="input-group input-group-dynamic mb-4">
                                <textarea class="form-control" rows="5" placeholder="Nội dung sản phẩm." spellcheck="false"
                                    name="product_content"></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Danh mục sản phẩm</label>
                                <select name="product_cate" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($cate_product as $item)
                                        <option value= {{$item->category_id}}> {{$item->category_name}} </option>                                        
                                    @endforeach                                    
                                </select>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Thương hiệu</label>
                                <select name="product_brand" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($brand_product as $item)
                                        <option value= {{$item->brand_id}}> {{$item->brand_name}} </option>                                        
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
                                name="add_product" style="margin: 0 auto">Thêm</button>
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
