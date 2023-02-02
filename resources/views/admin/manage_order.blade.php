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
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tên người đặt</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tổng giá tiền</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tình trạng</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2 ">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_order as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->customer_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->order_total }}</p>
                                </div>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <span class='text-dark text-xs'>{{ $item->order_status }}</span>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="/view-order/{{ $item->order_id}}"
                                    class="text-secondary font-weight-normal text-xs" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    <button type="button" class="btn bg-gradient-primary mb-0">
                                        Xem
                                    </button>
                                </a>

                                <a href="/delete-category-product/{{ $item->customer_name}}">
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