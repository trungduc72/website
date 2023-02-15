@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px">
                <header class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4">
                    Cập nhật sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $item)
                            <form role="form" action="/update-product/{{ $item->product_id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group input-group-static">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="product_name"
                                        value={{ $item->product_name }}>
                                </div>
                                @error('product_name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="input-group input-group-static mt-4">
                                    <label>Số lượng sản phẩm</label>
                                    <input type="text" class="form-control" name="product_quantity"
                                        value={{ $item->product_quantity }}>
                                </div>
                                @error('product_quantity')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="input-group input-group-static mt-4">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" min="1" class="form-control" name="product_price"
                                        value={{ $item->product_price }}>
                                </div>
                                @error('product_price')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="input-group input-group-static mt-4 mb-4">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image">
                                    <h6 class="mb-0 text-xs"> <img
                                            src="{{ URL::to('upload/product/' . $item->product_image) }}" height="100px"
                                            width="120px"> </h6>
                                </div>
                                <label style="margin-left: 0">Mô tả sản phẩm</label>
                                <div class="input-group input-group-dynamic">
                                    <textarea class="form-control" rows="5" placeholder="Mô tả sản phẩm." spellcheck="false" name="product_desc"> {{ $item->product_desc }}</textarea>
                                </div>
                                @error('product_desc')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="mt-4">
                                    <label style="margin-left: 0">Nội dung sản phẩm</label>
                                    <div class="input-group input-group-dynamic">
                                        <textarea class="form-control" rows="5" placeholder="Nội dung sản phẩm." spellcheck="false"
                                            name="product_content"> {{ $item->product_content }}</textarea>
                                    </div>
                                </div>
                                @error('product_content')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div class="input-group input-group-static mt-4 mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($cate_product as $cate)
                                            @if ($cate->category_id == $item->category_id)
                                                <option selected value={{ $cate->category_id }}>
                                                    {{ $cate->category_name }}
                                                </option>
                                            @else
                                                <option value={{ $cate->category_id }}> {{ $cate->category_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Thương hiệu</label>
                                    <select name="product_brand" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($brand_product as $brand)
                                            @if ($cate->category_id == $item->category_id)
                                                <option selected value={{ $brand->brand_id }}> {{ $brand->brand_name }}
                                                </option>
                                            @else
                                                <option value={{ $brand->brand_id }}> {{ $brand->brand_name }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                    <select name="product_status" class="form-control" id="exampleFormControlSelect1">
                                        @if ($item->product_status == 1)
                                            <option selected value="1">Hiển thị</option>
                                            <option value="0">Ẩn</option>
                                        @else
                                            <option value="1">Hiển thị</option>
                                            <option selected value="0">Ẩn</option>
                                        @endif
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                    name="add_product" style="margin: 0 auto"> Sửa sản phẩm </button>
                            </form>
                        @endforeach
                        {{-- <?php
                        // $message = Session::get('message');
                        // if ($message) {
                        //     echo '<span style = "color: green">' . $message . '</span> ';
                        //     Session::put('message', null);
                        // }
                        ?> --}}
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
