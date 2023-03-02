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
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên mã giảm giá
                        </th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Mã giảm giá</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Số lượng mã</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Điều kiện giảm giá
                        </th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Số giảm</th>
                        <th class="text-secondary opacity-7">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupon as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->coupon_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->coupon_code }}</p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <p class="text-xs font-weight-bold mb-0">{{ $item->coupon_time }}</p>
                                </div>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                    if ($item->coupon_condition == 1) {
                                    ?>
                                    <p class="text-xs font-weight-bold mb-0">Giảm theo %</p>
                                    <?php } else { ?>
                                    <p class="text-xs font-weight-bold mb-0">Giảm theo tiền</p>
                                    <?php } ?>
                                </span>
                            </td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php
                                    if ($item->coupon_condition == 1) {
                                    ?>
                                    <p class="text-xs font-weight-bold mb-0">Giảm {{ $item->coupon_number }} %</p>
                                    <?php } else { ?>
                                    <p class="text-xs font-weight-bold mb-0">Giảm {{ $item->coupon_number }} VND</p>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="/delete-coupon/{{ $item->coupon_id }}">
                                    <button type="button" class="btn bg-gradient-danger mb-0"
                                        onclick="return confirm('Bạn có chắc là muốn xóa mã giảm này không?')">
                                        Xóa
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{$coupon->links('vendor.pagination.bootstrap-4')}}
    </div>
@endsection
