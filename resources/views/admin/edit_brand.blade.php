@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <section class="panel" style="margin: 50px">
                <header class="d-flex justify-content-center text-uppercase text-secondary text-xxl font-weight-bolder mb-4">
                    Sửa thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_brand as $item)
                        <div class="position-center">
                            <form role="form" action="/update-brand/{{ $item->brand_id }}" method="POST">
                                @csrf
                                <div class="input-group input-group-static">
                                    <label>Tên thương hiệu</label>
                                    <input type="text" class="form-control" value={{ $item->brand_name }}
                                        name="brand_name">
                                </div>
                                @error('brand_name')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                                <div>
                                    <label class="mt-4" style="margin-left: 0">Mô tả thương hiệu</label>
                                    <div class="input-group input-group-dynamic mb-4">
                                        <textarea class="form-control" rows="5" placeholder="Mô tả thương hiệu." spellcheck="false" name="brand_desc">{{ $item->brand_desc }}</textarea>
                                    </div>                                    
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg d-flex justify-content-center"
                                    name="update_brand" style="margin: 0 auto">Sửa thương hiệu</button>
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
