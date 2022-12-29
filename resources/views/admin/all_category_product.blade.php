@extends('adminLayout')
@section('Dashboard.Admin')
    {{-- <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_category_product as $item)
              <tr>
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $item->category_name }}</td>
                <td><span class="text-ellipsis">{{ $item->category_desc }}</span></td>
                <td><span class="text-ellipsis">
                  <?php
                  if ($item->category_status == 0) {
                      echo "<a href='{{ route('Category.List.Hide') }}'><i class='fa-solid fa-toggle-off'></i> Hide</a>";
                  } else {
                      echo "<a href='{{ route('Category.List.Hide') }}'><i class='fa-solid fa-toggle-on'></i> Show</a>";
                  }
                  
                  ?>
                </span></td>
                <td>
                  <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                </td>
              </tr>                
            @endforeach
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div> --}}

    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên danh mục</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Hiển thị</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_category_product as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    {{-- <div>
                                    <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg"
                                        class="avatar avatar-sm me-3">
                                </div> --}}
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $item->category_name }}</h6>
                                        <p class="text-xs text-secondary mb-0"></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $item->category_desc }}</p>
                            </td>
                            <td><span class="text-ellipsis">
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
                                </span></td>
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
