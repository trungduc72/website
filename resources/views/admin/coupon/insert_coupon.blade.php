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
                    Thêm mã giảm giá
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action={{ URL::to('insert-coupon-code') }} method="POST">
                            @csrf
                            <div class="input-group input-group-static">
                                <label>Tên mã giảm giá</label>
                                <input type="text" class="form-control" name="coupon_name">
                            </div>
                            @error('category_product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div class="input-group input-group-static">
                                <label class="mt-4" style="margin-left: 0">Mã giảm giá</label>
                                <input type="text" class="form-control" name="coupon_code">
                            </div>
                            @error('category_product_desc')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div class="input-group input-group-static">
                                <label>Số lượng</label>
                                <input type="text" class="form-control" name="coupon_time">
                            </div>
                            @error('category_product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Tính năng mã </label>
                                <select name="coupon_condition" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0">---Chọn tính năng---</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo tiền</option>
                                </select>
                            </div>

                            <div class="input-group input-group-static mb-4">
                                <label>Nhập số % hoặc tiền giảm</label>
                                <input type="text" class="form-control" name="coupon_number">
                            </div>
                            @error('category_product_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                name="add_category_product" style="margin: 0 auto">Thêm mã giảm giá</button>
                        </form>

                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection
