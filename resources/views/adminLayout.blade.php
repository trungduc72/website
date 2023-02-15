<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/images/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('frontend/images/logo.png') }}">
    <title>
        @yield('title') | Admin
    </title>

    <meta name="keywords"
        content="creative tim, updivision, html dashboard, laravel, material, html css dashboard laravel, laravel material dashboard laravel, laravel material dashboard laravel pro, laravel material dashboard, laravel material dashboard pro, material admin, laravel dashboard, laravel dashboard pro, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, material dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, material dashboard, material laravel bootstrap 5 dashboard" />
    <meta name="description"
        content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta itemprop="name" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta itemprop="description"
        content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta itemprop="image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta name="twitter:description"
        content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Material Dashboard 2 PRO Laravel by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/material-dashboard-pro-laravel" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/158/original/material-dashboard-pro-laravel.jpg" />
    <meta property="og:description"
        content="Fullstack tool for building Laravel apps with hundreds of UI components and ready-made CRUDs" />
    <meta property="og:site_name" content="Creative Tim" />

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    {{-- <link id="pagestyle"
        href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/material-dashboard.css?v=3.0.1"
        rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset('themecss/style.css') }}">
</head>

<body class="g-sidenav-show bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex align-items-center text-wrap" href={{ route('dashboard') }}>
                <img src="{{ asset('frontend/images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">TEA THAINGUYEN</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mb-2 mt-0">
                    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white"
                        aria-controls="ProfileNav" role="button" aria-expanded="false">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAA9lBMVEX///9BQULlMTXJmUX7+/v29vbz8/PQ0NA1NTb5+flfX2DLy8ve3t48PD0+Pj/v7+9oaGl4eHleXl+zs7PkIyjp6emampva2trDw8PkIieNjY0wMDHq6upYWFnMzMzlLTGFhYVsbG25ubmjo6R9fX6enp/HlTpJSUqTk5Srq6tRUVLugIJISEnnQET74uLkGiD3xsf0srPauoXwkZPiyaHsdHf619j2vL7VsHLn0rH97OzxnZ/pWFvoS07rZWjpVFfteXvv4csjIyQnJyjmOT3NoFD63t/4zc327uHdwJHLnk7Ejyvxl5nzqarjCxTq17r06djSqWeOL8Z1AAAO20lEQVR4nO2dC1ubyhaGE4VAuAaQgCQYLkmERKu2dVuvrbXW2urZ7f//M2cuJIEw0SRCYt3zPud0t8Yw882sWWvNADOVCoVCoVAoFAqFsjyqYa27CuUiDVpyuL7iuYZTK7eE9q5crba8cguZDdeSeVcttQgBCKxWea/UQmbC7CnVquyyJRbh8FVEyymxkNmEqHheK68E8aaa0FrHWKwPFFx4r6wS2F1lpLDK22WVMhubH7UvV1IJiY2ioahUVx80NDlRqAzqpRTAJdJwQfKgXJ+Wx6xOLKhZSgkN7EeDitEqe8ATiaEJKTJuX6mEAgx+HCiaSGKrnIacBSPAUOEzHqyH7BdfgIrcjFI14T80pPZGLL6Y2XCwTJ6rMMiWeKPwAiLchThKsC4sRVHahRczG+jn5Ab4i6SAtlb2zIKvL2E3M0jyCVQKKJApuJjZIBsCTgDQ48vIq7rYzYxtI+BL9GkkghYcI6hFceTnix0jXAt34aTPsNXKKxuKvjxpULGVtqdiwBl3KzW862jAK6uKiiZs0NZo7KGQzEcFXt/GXbiXKbOqrDAqhiM/g1BlWHarwLQKJ6StrIfGsleUg8MatCa5cIDttLDLN/kq6YI4T22tYijC1lR2U9kottOiHJ2ZTFpy0wkcFeUVRMW0n8F1QmNELshOcaSYjIIxEhoOslB6VDShUfKZXBQlkQUFZDynqPI7+Y+SHLz0GT8cJlOpKOPLkxzrhfi4C4lO0+OziUA5MJN8ZgJO3pQCJhnJzJps8rVkKJY16Z5UQdmdXkYMC7JT1lXGsyYCOEFVBkXnwRmQn8kPBZRzvDxaxThSVGdJwF0sN8pZV0CgrJ/P25CJh8gL/alaVZ5JsUP+qT4uAuhnFJLDjqGjk/WX2WkS7HODIAX2NuXlNmic8DHpo8bL4z42hBnXH+Hz5ISgIER+5iiRXp6fekkXPmkIiUN96YCYWQd5VqxK7FRxl7dTqYXzteDpXzP3kEPdLcWhYiOdlfz6L7RTvDSquM/9noXTN72MO18qaD5ld9anJopW/LLx2MKjcI7ZA44ZvF9Ghuq0lCfcGM5P3SWDVbK6Pc/aZLJu012uoKcJXe2JlkMrm0vaqZWk3HOlfklYLHJlYT7aaHq+XN7oLFRpp+SwOBM0QmRhCTut4cZx53UfeCG8VfI8gwBq26dDNhlGa/GAubu/ruOwWGKGSoYZyHB+s0SsYri4Fy4QxlVUkrK6dfARUouX+VYZt6OmMas8v4Y7p8Anel68moVbyQtLftyFQqFQKBQKhUKh/DcwA29QynLUa4CxYk1puZH9JidQNS5s8Hwj5Mp8jn5dMKYd6fKuFlsrX6BZATXJ8Aay6wXSW1SncqG2pzQi21z90lP5AMMU5Kofcqt+mn0lSCAetKqaYb1Fp1KRQDz4uucFpT55sU6sr3okvknDHPMWPeYasfyl1rFrf1FKZbSqvQU1mobfWMX9i6KQtK/VBW4TtI1GSw/+Mhdv+V+V+foRyLuRowJvC3GRKNpBYBhxHIY9SBjGhhHYImcV6m0lr3XjPVdxKXS/yl6xD0hawt7eYOAKDd/Xul0P0e1qfkMfVAu+0V0zhJvdcOboAjNSpSUscp/zNQIciDIA+T2bToEZ1hRDbVAV3kiMBjNQzR0ImtOLYyMOm54mDFw/Cqy/KDg8D6NKohE2oyjqxcGO1H6LCYg5elI4MVdzpa9ArgItWeUKk4d8THkN75SXiXSTzGri0XqeVcobweujMXp8zR4/b2pX34QjTdiRR9FiZ/I0YfOFz3m/JpjB+EleSZj8uFvCe91roqeP/2qm3mYdu5+iaHtrGttW6on1dublAU17JjKqotFzur4335Ctd/nuWhbu49SWJmo180pg/HRWWnN5npdlee5HQ63mQNbWe3dCXeg5PZPHb1Au8iSxFA5amr3GrKm5UAM7+J2DBd+xM4HILuGdxNcI08WPOy88g5Sae0r0d+QUXfSC3zLJAecpgvEXTGDqrlKVl4wqtUCoOq9/hs21XrLPhOVUheC1d6T39UWJgWq41eh1382oBy91/Zx2o5X7OvD6MZ0b/a1rZGPeeztzGTLtwaq3AFs5tdW/FUShUCgUCoVCoVAoFAqFQvkPwrzFB7EmnB0d73f+WXctSuPs6Gpru9PZPl93RcqBuRt+2+5sALaG665LGbw7v9zaQvqAwg/rrk3hnJ1cdUbyAAeP665QsTCHXza2J/I2gNazdddpBvUl7hidnRxvHaS6D7iZzpeyBB5dfljeS7Onn372+7fvr+dWybw7PP9yuX2Q6b3tjauj8joQjPTtZa9/utnfhPT7f66f/eWzd3ePH672tw9AYEir63weHpZpn8wGKK5zsLFMKe+xPizydGYJZ+/+OTkfXu13Dra3Otm+27ocHr0r+b4oUohK2/9yspjIlMB+f1oicwaEHR6dD48v9jeAlIw2MO62DraBuu+ryNS+dVLD4eLhbm6V/wJVQBk01P7pKfjHD/DD78eAq6uLz5f738AFkbK0NCzuYOPiw0nZfTfmcydT+tbG5+HRP3PIZG43N+/vT+9/fvz16x7J/QR+en7QGbMxBbj69sHB/tXDyUq6bszj/7Y6uXps7V8NH0/u3p1NtzNzdnc0vDysoC68hb1WZ/49rfyGBgs78W57Whe8Img4dM0Pc7Vd4ZwMLztZFzBu74ODzrfLi6vjL0PAl+Orz9+AhQHLu6rgUdjffI98KOxP7Gzq+52UMKhse2tj/2J4fvh9rfH87PDhiiBzVE9YUzSgks87F+A7f7CL+fXnB1SI+vA9+PHDARYGDGP/89Xw4RFIeyUPkdTfHT4cA5lEnVOqQR/WbxM3+us3+PL1e6gQDkTmw+XF8fD86O772atMwoDMx+HFNzBotki+IhEIrTQxzM3+x8r9aBy+x9dYs4Y5YM5ghEZxDA7FbejzE7bB4AQx5a6CrfT2/tP7+qd+/wf78SdQeL/umi8KCNrf/zk8OXo8P3/4AHk4fzyCDhZ9eg/6755BHgdIO4V9+Hzm9lfxG/nS38in/mTuoZm+Eo9SGJ+gqF/X/6Kc5hqNyDfGD5SW/oFedPP2z2b/dt0VKp7rPnanODD+/LHu+pTA9c/x7KL/5y0KBIZ6D6cXgNvTt+ZlxrDXH8EEY/5FDAqFQqFQKBQKhUKZD2aZe8JFY2bOJMzt52VEzYQoe3ihmj7biokJJ063DU/zNScgvLxup9/ZZuL8Bn5BgW/ni4PUDkmsPvUiNqNpzojsC4Fc+pSxyM2/nRwLQmQEhqML+TcJo0ZKdjjItYGpF3UWOGBHECa1Y4WcwlkvOnKpYxgdPdfkjKcbeMG7Frq5I3jr/uRHnJvfhMrQG8XtaST63cn7qEspZBwhb1NeanNMTs8dmye5o+uqjfyZeowW+cXtvSX6UmO83coyChmnkd8JIc706k6+mwI9+ZKj5Ueh5Uq94vb7ERsV0R29G76MQpLAtp51S71GToajoe8bOmGjiGYXiCxs3wERFN4cWf0SCh2BUMW4kf23mu9E1YfOxNIJx8uyQgAKXuIcQjJQ4XjgL64wyjsZgDa9zZCXP+8behjWz/8cxBIBxB6jQfhkKaBCMPBxUy6sMCLutlsTpnfUMQinw8Z6O/JJLrMLZZtuUdsqIIVgOKCa5hV2mxxmZ6ouSGHkEg8XNXMdKzYIW5Z0feLmEO0B+qlX1GGrWGHi0ggKhQR3qjM5nQVOxnBJxzSb7rTCHYHQWapAHGtxA/W3PffBpc+QKGw34B5fBCuNGRYz9T1OVyMQB2OX4GjUnPcJ8s4U0CAGPR8PYlYoKCQmCkHIEBcbh4KHwoRDGEqMP/2tiBjeiArHcaJZUEgcKaz0gAdbyNPgOMj6hF1ImtPbdpDtkaiw6UuYgOimF2essK51F1I4Mk9Jz+9AZ03ZbkCO3ySFNV/QMQK5WRZmrBDliov04eh7NiF19jInYLcb5KkCSaGtS20TocZ+IQ+rTBSCluYay8wtwnzmreqpUF7TiH6GrDCVGxQUElMKwYRgKYWM5+cUSHp3NCmWfGFGjklQaKZDZDEhMa2w5udnwDFbS8g6lPT8UCUkX5Km9yy11uYit0tYAEAQFGYs0yZF0YXZSVsQ5+Yivj5iah6bmeNb09+DXw00+C2ha89cq8krZDIZba2QkMhmxlDuWBuJG5M1tXrGW5KPwzEtzprVf+ji+W9Jtdn/olAoFAqFQqFQFoTlKhYjcRV79to8Q578vYJbqvPh2E7bNtiQGx/EY9pG5r5nPVloYiMEOk8r5irN17/hNUZsmHHkxF4zTHoxjGyNi5q4i1QboME/wNRDRbNPFbZEuFqFtfHkjMkt+0qZekg5gxObUa1iiZXxOZyhUWmDGbuBF5fUwLYDqDDITq5Ca7UKxwsYTG41jctosnLzX7YSWEEzjMIeltT2gOoYzqgTo5VqjFdRTbjxMzBR9H/QoE0J/q88LBtdneF2WBN23HjrcCY2RWkkBi4s1GJ8nGBbRC0uEbZhj+zYZJxKG6+y2cAKevB3R8d7OFLdq5geuDawUDbi6mwNaHdMpFAtaeIb2lJgwZHPWU1YL643LsiJrQD1aChKPQnuS442JudCS2wSFTLNXhCLkidxWKEhVljYfUwXT+vb3QoL5HmJkSb/hZ/CMxKa5ezmzSXDzgA9V4NrMurESuE9DegkRFg0XABDVsqGydfyCi1RMmLD7toBPvJkJ6wY8HJ2snoW2kihiD9tJ0vkHPgUKOS8EuRBZYn9oDEHR8/kiRkG/g0+9YJ+J64lClUPnskokq3UCmIVNAabrAV3Pbj4byfLjhaQBBVWuvA6dQ3fbmR8Eyq0CXf2C0FMTAM+/MPCpk714UihDX8HWTDqQ/hjuMiY9zRMxRbjQOxydqKQkZiKofWSuktACgvjoSlB2Yn1eNBlR36vtKDf20GOQ21KEjpwrTZeike+NAS1q/c4M4biLBQ/bMO0IqhwFFe4UVhpO04ttjmOs9MH82T6pj5qQHu8dAz/MMs8HIwLONh8NRClUGHi2NNALyjBz+o2zksYrEkK0GKoOnK6ZtpF1FN/UigUCoVCoVD+2/wfkPk9edZyOXEAAAAASUVORK5CYII="
                            alt="avatar" class="avatar">
                        <span class="nav-link-text ms-2 ps-1">
                            <?php
                            $name = Session::get('admin_name');
                            if ($name) {
                                echo $name;
                            }
                            ?>
                        </span>
                    </a>
                    <div class="collapse" id="ProfileNav" style="">
                        <ul class="nav ">
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="https://material-dashboard-pro-laravel.creative-tim.com/overview">
                                    <span class="sidenav-mini-icon"> HS </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Hồ sơ </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white "
                                    href="https://material-dashboard-pro-laravel.creative-tim.com/settings">
                                    <span class="sidenav-mini-icon"> CD </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Cài đặt </span>
                                </a>
                            </li>
                            <form method="POST"
                                action="https://material-dashboard-pro-laravel.creative-tim.com/sign-out" class="d-none"
                                id="logout-form">
                                <input type="hidden" name="_token"
                                    value="Om2xRNJMUhj5NW9sD2uIAEvzopc9UCfGeCHrUNO1">
                            </form>
                            <li class="nav-item">
                                <a class="nav-link text-white " href={{ route('logout') }}>
                                    <span class="sidenav-mini-icon"> DX </span>
                                    <span class="sidenav-normal  ms-3  ps-1"> Đăng xuất </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a class="nav-link text-white  " href={{ route('dashboard') }}>
                        <i class="material-icons-round opacity-10">dashboard</i>
                        <span class="sidenav-normal  ms-2  ps-1"> Bảng điều khiển </span>
                    </a>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white"
                        aria-controls="applicationsExamples" role="button" aria-expanded="false">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
                        <span class="nav-link-text ms-2 ps-1">Đơn hàng</span>
                    </a>
                    <div class="collapse" id="applicationsExamples" style="">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white " href={{ route('manage-order') }}>
                                    <span class="sidenav-mini-icon"> Q </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Quản lí đơn hàng </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white " href="#">
                                    <span class="sidenav-mini-icon"> K </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Kanban </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white collapsed "
                        aria-controls="dashboardsExamples" role="button" aria-expanded="false">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
                        <span class="nav-link-text ms-2 ps-1">Danh mục</span>
                    </a>
                    <div class="collapse  " id="dashboardsExamples">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white  " href={{ route('all-category-product') }}>
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Danh mục sản phẩm </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white  " href={{ route('add-category-product') }}>
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Thêm danh mục </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#LaravelExamples" class="nav-link text-white   "
                        aria-controls="LaravelExamples" role="button" aria-expanded="false">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
                        <span class="nav-link-text ms-2 ps-1">Thương hiệu</span>
                    </a>
                    <div class="collapse   " id="LaravelExamples">
                        <ul class="nav ">
                            <li class="nav-item  ">
                                <a class="nav-link text-white " href={{ route('all-brand') }}>
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Thương hiệu sản phẩm <b
                                            class="caret"></b></span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white   " href={{ route('add-brand') }}>
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Thêm thương hiệu<b
                                            class="caret"></b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white collapsed"
                        aria-controls="pagesExamples" role="button" aria-expanded="false">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
                        <span class="nav-link-text ms-2 ps-1">Sản phẩm</span>
                    </a>
                    <div class="collapse" id="pagesExamples" style="">
                        <ul class="nav ">
                            <li class="nav-item ">
                                <a class="nav-link text-white   " href={{ route('all-product') }}>
                                    <span class="sidenav-mini-icon"> D </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Danh sách sản phẩm<b
                                            class="caret"></b></span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link text-white   " href={{ route('add-product') }}>
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Thêm sản phẩm<b
                                            class="caret"></b></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item ">
                    <a class="nav-link text-white collapsed" data-bs-toggle="collapse" aria-expanded="false"
                        href="#accountExample">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">upcoming</i>
                        <span class="sidenav-normal  ms-2  ps-1"> Mã giảm giá <b class="caret"></b></span>
                    </a>
                    <div class="collapse" id="accountExample" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white   " href="{{ route('list-coupon') }}">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Danh sách mã giảm giá </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white  " href="{{ route('insert-coupon') }}">
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Thêm mã giảm giá</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">
                <li class="nav-item ">
                    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false"
                        href="#projectsExample">
                        <i
                            class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
                        <span class="sidenav-normal  ms-2  ps-1"> Vận chuyển <b class="caret"></b></span>
                    </a>
                    <div class="collapse" id="projectsExample" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white  " href="{{ URL::to('/delivery') }}">
                                    <span class="sidenav-mini-icon"> Q </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Quản lí vận chuyển </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white  "
                                    href="https://material-dashboard-pro-laravel.creative-tim.com/timeline">
                                    <span class="sidenav-mini-icon"> T </span>
                                    <span class="sidenav-normal  ms-2  ps-1"> Timeline </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="horizontal light mt-0">

    </aside>

    <main class="main-content">
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky"
            id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40"
                                    version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40"
                                            fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path
                                                        d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                    </path>
                                                    <path
                                                        d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> @yield('title')
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">@yield('title')</h6>
                </nav>
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Search here</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav  align-items-center">
                        {{-- <li class="nav-item">
                            <a href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-sign-in"
                                class="nav-link text-body p-0 position-relative" target="_blank">
                                <i class="material-icons me-sm-1">
                                    account_circle
                                </i>
                            </a>
                        </li> --}}
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="material-icons fixed-plugin-button-nav cursor-pointer">
                                    settings
                                </i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2">
                            <a href="javascript:;" class="nav-link text-body p-0 position-relative"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons cursor-pointer">
                                    notifications
                                </i>
                                <span
                                    class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2">
                                    <span class="small">11</span>
                                    <span class="visually-hidden">unread notifications</span>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex align-items-center py-1">
                                            <span class="material-icons">email</span>
                                            <div class="ms-2">
                                                <h6 class="text-sm font-weight-normal my-auto">
                                                    Check new messages
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex align-items-center py-1">
                                            <span class="material-icons">podcasts</span>
                                            <div class="ms-2">
                                                <h6 class="text-sm font-weight-normal my-auto">
                                                    Manage podcast session
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex align-items-center py-1">
                                            <span class="material-icons">shopping_cart</span>
                                            <div class="ms-2">
                                                <h6 class="text-sm font-weight-normal my-auto">
                                                    Payment successfully completed
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid my-3 py-3">
            <div class="row mb-5">
                <div class="col-lg-12 mt-lg-0 mt-4">
                    @yield('admin_content')
                </div>
            </div>

        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>

            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">

                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>

                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>

                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Sidenav Mini</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarMinimize"
                            onclick="navbarMinimize(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                {{-- <a class="btn bg-gradient-primary w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank">Buy
                    now</a>
                <a class="btn btn-outline-dark w-100" href="../../documentation/getting-started/installation.html"
                    target="_blank">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button"
                        href="https://github.com/creativetimofficial/ct-material-dashboard-pro-laravel"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20Dashboard%202%20PRO%20Laravel%20made%20by%20%40CreativeTim%20%26%20%40UPDIVISION%20%23webdesign%20%23dashboard%20%23bootstrap5%20%23laravel&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fmaterial-dashboard-pro-laravel"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard-pro-laravel"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/core/popper.min.js"></script>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/core/bootstrap.min.js"></script>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/smooth-scrollbar.min.js">
    </script>

    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/perfect-scrollbar.min.js">
    </script>
    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/plugins/jkanban/jkanban.js"></script>
    {{-- <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script> --}}
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://material-dashboard-pro-laravel.creative-tim.com/assets/js/material-dashboard.min.js?v=3.0.1">
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"7810c0fcdb756c09","version":"2022.11.3","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}'
        crossorigin="anonymous"></script>
    
    {{-- delivery --}}
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            fetch_delivery();
            function fetch_delivery(){
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url: '{{url('/select-feeship')}}',
                    method: 'POST',
                    data: { 
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }

            $('.add_delivery').click(function() {
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url: '{{url('/insert-delivery')}}',
                    method: 'POST',
                    data: {
                        "city": city, 
                        "province": province, 
                        "wards": wards, 
                        "fee_ship": fee_ship, 
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        fetch_delivery();
                    }
                });

            });

            $('.choose').on('change', function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name = "_token"]').val();
                var result = '';

                if(action == 'city'){
                    result = 'province';
                } else{
                    result = 'wards';
                }

                $.ajax({
                    url: '{{url('/select-delivery')}}',
                    method: 'POST',
                    data: {
                        "action": action, 
                        "ma_id": ma_id, 
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        $('#' + result).html(data);
                    }
                });
            });

            $(document).on('blur', '.fee_feeship_edit', function(){
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name = "_token"]').val();
                
                $.ajax({
                    url: '{{url('/update-delivery')}}',
                    method: 'POST',
                    data: {
                        "feeship_id": feeship_id, 
                        "fee_value": fee_value,
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        fetch_delivery();
                    }
                });
            })

            $('.order_details').on('change', function(){
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name = "_token"]').val();

                //lay so luong
                quantity = [];
                $('input[name = "product_sales_quantity"]').each(function () {
                    quantity.push($(this).val());
                });
                //lay product_id
                order_product_id = [];
                $('input[name = "order_product_id"]').each(function () {
                    order_product_id.push($(this).val());
                });

                $.ajax({
                    url: '{{url('/update-order-qty')}}',
                    method: 'POST',
                    data: { 
                        "order_status": order_status,
                        "order_id": order_id,
                        "quantity": quantity,
                        "order_product_id": order_product_id,
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        alert('Cập nhật số lượng thành công!');
                        location.reload();
                    }
                });
            });

            $('.update_quantity_order').click(function() {
                var order_product_id = $(this).data('product_id');
                var order_qty = $('.order_qty_' + order_product_id).val();
                var order_code = $('.order_code').val();
                var _token = $('input[name = "_token"]').val();

                $.ajax({
                    url: '{{url('/update-qty')}}',
                    method: 'POST',
                    data: {
                        "order_product_id": order_product_id, 
                        "order_qty": order_qty, 
                        "order_code": order_code, 
                        "_token":_token, 
                        "_token": "{{ csrf_token() }}"},
                    success: function(data){
                        alert('Thay đổi tình trạng đơn hàng thành công!');
                        location.reload();
                    }
                });

            });

        });
    </script>
    {{-- end-delivery  --}}
</body>

</html>
