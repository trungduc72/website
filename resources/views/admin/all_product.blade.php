@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('admin_content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên sản phẩm</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Số lượng sản phẩm</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Giá</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Hình ảnh</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Mô tả sản phẩm
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Nội dung sản phẩm
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Danh mục sản phẩm
                        </th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Thương hiệu</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                        <th class="text-secondary opacity-7">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_product as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->product_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->product_quantity }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->product_price }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs"> <img src="upload/product/{{ $item->product_image }}"
                                                height="100" width="100"> </h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->product_desc }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->product_content }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->category_name }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->brand_name }}</p>
                                </div>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                    if ($item->product_status == 1) {
                                    ?>
                                    <a href="/unactive-product/{{ $item->product_id }}">
                                        <span class='badge badge-dot me-4'>
                                            <i class='bg-success'></i>
                                            <span class='text-dark text-xs'>Hiển thị</span>
                                        </span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="/active-product/{{ $item->product_id }}">
                                        <span class='badge badge-dot me-4'>
                                            <i class='bg-danger'></i>
                                            <span class='text-dark text-xs'>Ẩn</span>
                                        </span>
                                    </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="/edit-product/{{ $item->product_id }}"
                                    class="text-secondary font-weight-normal text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    <button type="button" class="btn bg-gradient-primary mb-0">
                                        Sửa
                                    </button>
                                </a>
                                <a href="/delete-product/{{ $item->product_id }}">
                                    <button type="button" class="btn bg-gradient-danger mb-0"
                                        onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')">
                                        Xóa
                                    </button>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
