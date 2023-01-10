@extends('adminLayout')
@section('title')
    {{$title}}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px" >
                <header class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4" >
                    Sửa danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_category_product as $item)
                    <div class="position-center">
                        <form role="form" action="/update-category-product/{{$item->category_id}}" method="POST">
                            @csrf
                            <div class="input-group input-group-static">
                                <label >Tên danh mục</label>
                                <input type="text" class="form-control" value={{$item->category_name}} name="category_product_name">
                            </div>
                            @error('category_product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div>
                                <label class="mt-4" style="margin-left: 0">Mô tả danh mục</label>
                                <div class="input-group input-group-dynamic">
                                    <textarea class="form-control" rows="5" placeholder="Mô tả danh mục." spellcheck="false" name="category_product_desc">{{$item->category_desc}}</textarea>
                                </div>
                            </div>
                            @error('category_product_desc')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center mt-4" name="update_category_product" style="margin: 0 auto">Sửa</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
