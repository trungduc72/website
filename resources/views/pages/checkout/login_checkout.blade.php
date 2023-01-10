<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('backend/css/DashboardAdmin.css') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.png') }}">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

</head>

<body>
    <main class="main-content mt-0 ps">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1448375240586-882707db888b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1650&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container mt-5">
                <div class="row signin-margin">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập</h4>
                                    <div class="row mt-3">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                                <form role="form" method="POST" action={{ route('login-customer') }}
                                    class="text-start">
                                    @csrf
                                    <div class="input-group input-group-dynamic mt-3 is-filled">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control mb-3" name="customer_email">
                                    </div>
                                    @error('customer_email')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <div class="input-group input-group-dynamic mt-3 is-filled">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="password" class="form-control" name="customer_password">
                                    </div>
                                    @error('customer_password')
                                        <span style="color: red">{{ $message }}</span>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Đăng
                                            nhập</button>
                                    </div>
                                </form>
                                <p class="text-sm text-center mt-3">
                                    Quên mật khẩu? Cài lại mật khẩu
                                    <a href="https://material-dashboard-pro-laravel.creative-tim.com/verify"
                                        class="text-dark text-gradient font-weight-bold">tại đây</a>
                                </p>
                                <p class="mt-4 text-sm text-center">
                                    Bạn chưa có tài khoản?
                                    <a href={{route('signup')}}
                                        class="text-dark text-gradient font-weight-bold">Đăng kí</a>
                                </p>
                                <p class="mt-4 text-sm text-center">
                                    Quay lại
                                    <a href= {{route('home')}}
                                        class="text-dark text-gradient font-weight-bold">Trang chủ</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-footer py-2 w-100 z-index-1">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 my-auto">
                            <div class="copyright text-center text-sm text-white ">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                copied with <i class="fa fa-heart" aria-hidden="true"></i> by DucZunnn for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </main>
</body>

</html>
