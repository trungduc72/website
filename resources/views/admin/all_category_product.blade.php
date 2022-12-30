@extends('adminLayout')
@section('title')
    {{ $title }}
@endsection
@section('Dashboard.Admin')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Tên danh mục</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Mô tả</th>
                        <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7 ps-2">Hiển thị</th>
                        <th class="text-secondary opacity-7"></th>
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
                                        echo "<span class='badge badge-dot me-4'>
                                                <i class='bg-success'></i>
                                                <span class='text-dark text-xs'>Show</span>
                                              </span>";
                                    } else {
                                        echo "<span class='badge badge-dot me-4'>
                                                <i class='bg-danger'></i>
                                                <span class='text-dark text-xs'>Hide</span>
                                              </span>";
                                    }                                    
                                    ?>
                                </span>
                            </td>
                            <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-normal text-xs"
                                    data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
