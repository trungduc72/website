@extends('adminLayout')
@section('title')
    {{$title}}
@endsection
@section('Dashboard.Admin')
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
                            <div class="input-group input-group-static mb-4">
                                <label >Tên danh mục</label>
                                <input type="text" class="form-control" value={{$item->category_name}} name="category_product_name">
                            </div>
                            <label style="margin-left: 0">Mô tả danh mục</label>
                            <div class="input-group input-group-dynamic mb-4">
                                <textarea class="form-control" rows="5" placeholder="Mô tả danh mục." spellcheck="false" name="category_product_desc">{{$item->category_desc}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center" name="update_category_product" style="margin: 0 auto">Sửa</button>
                        </form>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span style = "color: green">' . $message . '</span> ';
                            Session::put('message', null);
                        }
                        ?>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
