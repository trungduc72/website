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
                    Thêm vận chuyển
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form>
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Chọn thành phố</label>
                                <select name="city" id="city" class="form-control choose city" id="exampleFormControlSelect1">
                                    <option value="">---Chọn tỉnh, thành phố---</option>
                                    @foreach ($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_tp}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Chọn quận huyện</label>
                                <select name="province" id="province" class="form-control choose province" id="exampleFormControlSelect1">
                                    <option value="">---Chọn quận huyện---</option>
                                </select>
                            </div>

                            <div class="input-group input-group-static mt-4 mb-4">
                                <label for="exampleFormControlSelect1" class="ms-0">Chọn xã phường</label>
                                <select name="wards" id="wards" class="form-control wards" id="exampleFormControlSelect1">
                                    <option value="">---Chọn xã phường---</option>
                                </select>
                            </div>

                            <div class="input-group input-group-static mb-4">
                                <label>Phí vận chuyển</label>
                                <input type="text" class="form-control fee_ship" name="fee_ship">
                            </div>

                            <button type="button" class="btn btn-primary btn-lg d-flex justify-content-center add_delivery"
                                name="add_delivery" style="margin: 0 auto">Thêm vận chuyển</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="load_delivery" class="mt-5">

    </div>
@endsection
