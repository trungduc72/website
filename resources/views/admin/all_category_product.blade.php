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
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Mô tả</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                        <th class="text-secondary opacity-7">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_category_product as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->category_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->category_desc }}</p>
                                </div>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                    if ($item->category_status == 1) {
                                    ?>
                                    <a href="/unactive-category-product/{{ $item->category_id }}">
                                        <span class='badge badge-dot me-4'>
                                            <i class='bg-success'></i>
                                            <span class='text-dark text-xs'>Hiển thị</span>
                                        </span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="/active-category-product/{{ $item->category_id }}">
                                        <span class='badge badge-dot me-4'>
                                            <i class='bg-danger'></i>
                                            <span class='text-dark text-xs'>Ẩn</span>
                                        </span>
                                    </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="/edit-category-product/{{ $item->category_id }}"
                                    class="text-secondary font-weight-normal text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    <button type="button" class="btn bg-gradient-primary mb-0" >
                                    Sửa
                                </button>
                                </a>

                                <button type="button" class="btn bg-gradient-danger mb-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" >
                                    Xóa
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc là muốn xóa danh mục này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <a href="/delete-category-product/{{ $item->category_id }}">
                                                <button type="button" class="btn bg-gradient-primary">Đồng ý</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
