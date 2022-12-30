@extends('adminLayout')
@section('title')
    {{$title}}
@endsection
@section('Dashboard.Admin')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px" >
                <header class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4" >
                    Thêm danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ route('save-category-product') }} method="POST">
                            @csrf
                            <div class="input-group input-group-dynamic mb-4">
                                <label class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" name="category_product_name">
                            </div>
                            <div class="input-group input-group-dynamic mb-4">
                                <textarea class="form-control" rows="5" placeholder="Mô tả danh mục." spellcheck="false" name="category_product_desc"></textarea>
                            </div>
                            <div class="input-group input-group-static mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Trạng thái</label>
                                <select name="category_product_status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                              </div>

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center" name="add_category_product" style="margin: 0 auto">Thêm</button>
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
