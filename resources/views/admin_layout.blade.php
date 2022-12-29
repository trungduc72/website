
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="backend/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="backend/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="backend/css/font.css" type="text/css"/>
<link href="backend/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="backend/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="backend/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="backend/js/jquery2.0.3.min.js"></script>
<script src="backend/js/raphael-min.js"></script>
<script src="backend/js/morris.js"></script>
<link rel="stylesheet" href="/db.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<link href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/nucleo-svg.css" rel="stylesheet" />

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link id="pagestyle" href="https://material-dashboard-pro-laravel.creative-tim.com/assets/css/material-dashboard.css?v=3.0.1" rel="stylesheet" />
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        HEHE
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="">
                <span class="username">
                    <?php 
                        $name = Session::get('admin_name');
                        if($name){
                            echo($name);
                        }
                    ?> 
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href= {{route('logout')}}><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
{{-- <aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href={{route('dashboard')}}>
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href={{route('add-category-product')}}>Thêm </a></li>
						<li><a href={{route('all-category-product')}}>Liệt kê</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside> --}}

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps ps--active-y bg-white" id="sidenav-main">
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 d-flex align-items-center text-wrap" href="https://material-dashboard-pro-laravel.creative-tim.com/dashboard">
    <img src="https://material-dashboard-pro-laravel.creative-tim.com/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
    <span class="ms-2 font-weight-bold text-white">Material Dashboard 2 PRO Laravel</span>
    </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto h-auto ps" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item mb-2 mt-0">
    <a data-bs-toggle="collapse" href="#ProfileNav" class="nav-link text-white" aria-controls="ProfileNav" role="button" aria-expanded="false">
    <img src="/storage/profile/avatar.jpg" alt="avatar" class="avatar">
    <span class="nav-link-text ms-2 ps-1">Admin</span>
    </a>
    <div class="collapse" id="ProfileNav" style="">
    <ul class="nav ">
    <li class="nav-item">
    <a class="nav-link text-white" href="https://material-dashboard-pro-laravel.creative-tim.com/overview">
    <span class="sidenav-mini-icon"> MP </span>
    <span class="sidenav-normal  ms-3  ps-1"> My Profile </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/settings">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-3  ps-1"> Settings </span>
    </a>
    </li>
    <form method="POST" action="https://material-dashboard-pro-laravel.creative-tim.com/sign-out" class="d-none" id="logout-form">
    <input type="hidden" name="_token" value="Om2xRNJMUhj5NW9sD2uIAEvzopc9UCfGeCHrUNO1"> </form>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/sign-out" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <span class="sidenav-mini-icon"> L </span>
    <span class="sidenav-normal  ms-3  ps-1"> Logout </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <hr class="horizontal light mt-0">
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white  " aria-controls="dashboardsExamples" role="button" aria-expanded="false">
    <i class="material-icons-round opacity-10">dashboard</i>
    <span class="nav-link-text ms-2 ps-1">Dashboards</span>
    </a>
    <div class="collapse   " id="dashboardsExamples">
    <ul class="nav ">
    <li class="nav-item   ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/dashboard">
    <span class="sidenav-mini-icon"> A </span>
    <span class="sidenav-normal  ms-2  ps-1"> Analytics </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/discover">
    <span class="sidenav-mini-icon"> D </span>
    <span class="sidenav-normal  ms-2  ps-1"> Discover </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/sales">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Sales </span>
    </a>
    </li>
    <li class="nav-item   ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/automotive">
    <span class="sidenav-mini-icon"> A </span>
    <span class="sidenav-normal  ms-2  ps-1"> Automotive </span>
    </a>
    </li>
    <li class="nav-item   ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/smart-home">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Smart Home </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#LaravelExamples" class="nav-link text-white  active   " aria-controls="LaravelExamples" role="button" aria-expanded="false">
    <i class="fab fa-laravel" aria-hidden="true"></i>
    <span class="nav-link-text ms-2 ps-1">Laravel Examples</span>
    </a>
    <div class="collapse  show  " id="LaravelExamples">
    <ul class="nav ">
    <li class="nav-item  active ">
    <a class="nav-link text-white  active   " href="https://material-dashboard-pro-laravel.creative-tim.com/user-profile">
    <span class="sidenav-mini-icon"> UP </span>
    <span class="sidenav-normal  ms-2  ps-1"> User Profile <b class="caret"></b></span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/users-management">
    <span class="sidenav-mini-icon"> UM </span>
    <span class="sidenav-normal  ms-2  ps-1"> User Management <b class="caret"></b></span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/roles">
    <span class="sidenav-mini-icon"> RM </span>
    <span class="sidenav-normal  ms-2  ps-1"> Role Management <b class="caret"></b></span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/category">
    <span class="sidenav-mini-icon"> CM </span>
    <span class="sidenav-normal  ms-2  ps-1"> Category Management <b class="caret"></b></span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/tag">
    <span class="sidenav-mini-icon"> TM </span>
    <span class="sidenav-normal  ms-2  ps-1"> Tag Management <b class="caret"></b></span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/items">
    <span class="sidenav-mini-icon"> IM </span>
    <span class="sidenav-normal  ms-2  ps-1"> Item Management <b class="caret"></b></span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item mt-3">
    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">PAGES</h6>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white   " aria-controls="pagesExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">image</i>
    <span class="nav-link-text ms-2 ps-1">Pages</span>
    </a>
    <div class="collapse  " id="pagesExamples">
    <ul class="nav ">
    <li class="nav-item ">
    <a class="nav-link text-white   " data-bs-toggle="collapse" aria-expanded="false" href="#profileExample">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Profile <b class="caret"></b></span>
    </a>
    <div class="collapse  " id="profileExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/overview">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Profile Overview </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/projects">
    <span class="sidenav-mini-icon"> A </span>
    <span class="sidenav-normal  ms-2  ps-1"> All Projects </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " data-bs-toggle="collapse" aria-expanded="false" href="#usersExample">
    <span class="sidenav-mini-icon"> U </span>
    <span class="sidenav-normal  ms-2  ps-1"> Users <b class="caret"></b></span>
    </a>
    <div class="collapse  " id="usersExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/reports">
    <span class="sidenav-mini-icon"> R </span>
    <span class="sidenav-normal  ms-2  ps-1"> Reports </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/new-user">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> New User </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
    <span class="sidenav-mini-icon"> A </span>
    <span class="sidenav-normal  ms-2  ps-1"> Account <b class="caret"></b></span>
    </a>
    <div class="collapse  " id="accountExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/settings">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Settings </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/billing">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Billing </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/invoice">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Invoice </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/security">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Security </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " data-bs-toggle="collapse" aria-expanded="false" href="#projectsExample">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Projects <b class="caret"></b></span>
    </a>
    <div class="collapse  " id="projectsExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/general">
    <span class="sidenav-mini-icon"> G </span>
    <span class="sidenav-normal  ms-2  ps-1"> General </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/timeline">
    <span class="sidenav-mini-icon"> T </span>
    <span class="sidenav-normal  ms-2  ps-1"> Timeline </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/new-project">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> New Project </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " data-bs-toggle="collapse" aria-expanded="false" href="#vrExamples">
    <span class="sidenav-mini-icon"> V </span>
    <span class="sidenav-normal  ms-2  ps-1"> Virtual Reality <b class="caret"></b></span>
    </a>
    <div class="collapse  " id="vrExamples">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/vr-default">
    <span class="sidenav-mini-icon"> V </span>
    <span class="sidenav-normal  ms-2  ps-1"> VR Default </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/vr-info">
    <span class="sidenav-mini-icon"> V </span>
    <span class="sidenav-normal  ms-2  ps-1"> VR Info </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/pricing-page">
     <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Pricing Page </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/rtl">
    <span class="sidenav-mini-icon"> R </span>
    <span class="sidenav-normal  ms-2  ps-1"> RTL </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white   " href="https://material-dashboard-pro-laravel.creative-tim.com/widgets">
    <span class="sidenav-mini-icon"> W </span>
    <span class="sidenav-normal  ms-2  ps-1"> Widgets </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/charts">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Charts </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/sweet-alerts">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Sweet Alerts </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/notifications">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> Notifications </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white " aria-controls="applicationsExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
    <span class="nav-link-text ms-2 ps-1">Applications</span>
    </a>
    <div class="collapse  " id="applicationsExamples">
    <ul class="nav ">
    <li class="nav-item ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/crm">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> CRM </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/kanban">
    <span class="sidenav-mini-icon"> K </span>
    <span class="sidenav-normal  ms-2  ps-1"> Kanban </span>
    </a>
    </li>
    <li class="nav-item  ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/wizard">
    <span class="sidenav-mini-icon"> W </span>
    <span class="sidenav-normal  ms-2  ps-1"> Wizard </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/datatables">
    <span class="sidenav-mini-icon"> D </span>
    <span class="sidenav-normal  ms-2  ps-1"> DataTables </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/calendar">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Calendar </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/stats">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Stats </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white  " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
    <span class="nav-link-text ms-2 ps-1">Ecommerce</span>
    </a>
    <div class="collapse  " id="ecommerceExamples">
    <ul class="nav ">
    <li class="nav-item">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Products <b class="caret"></b></span>
    </a>
    <div class="collapse " id="productsExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/new-product">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> New Product </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/edit-product">
    <span class="sidenav-mini-icon"> E </span>
    <span class="sidenav-normal  ms-2  ps-1"> Edit Product </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/product-page">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Product Page </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/products-list">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Products List </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
    <span class="sidenav-mini-icon"> O </span>
    <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
    </a>
    <div class="collapse " id="ordersExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/list">
    <span class="sidenav-mini-icon"> O </span>
    <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/details">
    <span class="sidenav-mini-icon"> O </span>
    <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white  " href="https://material-dashboard-pro-laravel.creative-tim.com/referral">
    <span class="sidenav-mini-icon"> R </span>
    <span class="sidenav-normal  ms-2  ps-1"> Referral </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#authExamples" class="nav-link text-white " aria-controls="authExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">content_paste</i>
    <span class="nav-link-text ms-2 ps-1">Authentication</span>
    </a>
    <div class="collapse " id="authExamples">
    <ul class="nav ">
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signinExample">
    <span class="sidenav-mini-icon"> S </span>
     <span class="sidenav-normal  ms-2  ps-1"> Sign In <b class="caret"></b></span>
    </a>
    <div class="collapse " id="signinExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/basic-sign-in">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/cover-sign-in">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-sign-in">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#signupExample">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Sign Up <b class="caret"></b></span>
    </a>
    <div class="collapse " id="signupExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/basic-sign-up">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/cover-sign-up">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-sign-up">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#resetExample">
    <span class="sidenav-mini-icon"> R </span>
    <span class="sidenav-normal  ms-2  ps-1"> Reset Password <b class="caret"></b></span>
    </a>
    <div class="collapse " id="resetExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/basic-reset">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/cover-reset">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-reset">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#lockExample">
    <span class="sidenav-mini-icon"> L </span>
    <span class="sidenav-normal  ms-2  ps-1"> Lock <b class="caret"></b></span>
    </a>
    <div class="collapse " id="lockExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/basic-lock">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/cover-lock">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-lock">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#StepExample">
    <span class="sidenav-mini-icon"> 2 </span>
    <span class="sidenav-normal  ms-2  ps-1"> 2-Step Verification <b class="caret"></b></span>
    </a>
    <div class="collapse " id="StepExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/basic-verification">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Basic </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/cover-verification">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Cover </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/illustration-verification">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Illustration </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#errorExample">
    <span class="sidenav-mini-icon"> E </span>
    <span class="sidenav-normal  ms-2  ps-1"> Error <b class="caret"></b></span>
    </a>
    <div class="collapse " id="errorExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/404">
    <span class="sidenav-mini-icon"> E </span>
    <span class="sidenav-normal  ms-2  ps-1"> Error 404 </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="https://material-dashboard-pro-laravel.creative-tim.com/500">
    <span class="sidenav-mini-icon"> E </span>
    <span class="sidenav-normal  ms-2  ps-1"> Error 500 </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <hr class="horizontal light">
    <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">DOCS</h6>
    </li>
     <li class="nav-item">
    <a data-bs-toggle="collapse" href="#basicExamples" class="nav-link text-white " aria-controls="basicExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">upcoming</i>
    <span class="nav-link-text ms-2 ps-1">Basic</span>
    </a>
    <div class="collapse " id="basicExamples">
    <ul class="nav ">
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#gettingStartedExample">
    <span class="sidenav-mini-icon"> G </span>
    <span class="sidenav-normal  ms-2  ps-1"> Getting Started <b class="caret"></b></span>
    </a>
    <div class="collapse " id="gettingStartedExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/getting-started/installation.html" target="_blank">
    <span class="sidenav-mini-icon"> Q </span>
    <span class="sidenav-normal  ms-2  ps-1"> Quick Start </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/getting-started/license.html" target="_blank">
    <span class="sidenav-mini-icon"> L </span>
    <span class="sidenav-normal  ms-2  ps-1"> License </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/getting-started/overview.html" target="_blank">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Contents </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/getting-started/build-tools.html" target="_blank">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Build Tools </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#foundationExample">
    <span class="sidenav-mini-icon"> F </span>
    <span class="sidenav-normal  ms-2  ps-1"> Foundation <b class="caret"></b></span>
    </a>
    <div class="collapse " id="foundationExample">
    <ul class="nav nav-sm flex-column">
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/foundation/colors.html" target="_blank">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Colors </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/foundation/grid.html" target="_blank">
    <span class="sidenav-mini-icon"> G </span>
    <span class="sidenav-normal  ms-2  ps-1"> Grid </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/foundation/typography.html" target="_blank">
    <span class="sidenav-mini-icon"> T </span>
    <span class="sidenav-normal  ms-2  ps-1"> Typography </span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link text-white " href="../../documentation/foundation/icons.html" target="_blank">
    <span class="sidenav-mini-icon"> I </span>
    <span class="sidenav-normal  ms-2  ps-1"> Icons </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </div>
    </li>
    <li class="nav-item">
    <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link text-white " aria-controls="componentsExamples" role="button" aria-expanded="false">
    <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
    <span class="nav-link-text ms-2 ps-1">Components</span>
    </a>
    <div class="collapse " id="componentsExamples">
    <ul class="nav ">
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/alerts.html" target="_blank">
    <span class="sidenav-mini-icon"> A </span>
    <span class="sidenav-normal  ms-2  ps-1"> Alerts </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/badge.html" target="_blank">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Badge </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/buttons.html" target="_blank">
    <span class="sidenav-mini-icon"> B </span>
    <span class="sidenav-normal  ms-2  ps-1"> Buttons </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/cards.html" target="_blank">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Card </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/carousel.html" target="_blank">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Carousel </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/collapse.html" target="_blank">
    <span class="sidenav-mini-icon"> C </span>
    <span class="sidenav-normal  ms-2  ps-1"> Collapse </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/dropdowns.html" target="_blank">
    <span class="sidenav-mini-icon"> D </span>
    <span class="sidenav-normal  ms-2  ps-1"> Dropdowns </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/forms.html" target="_blank">
    <span class="sidenav-mini-icon"> F </span>
    <span class="sidenav-normal  ms-2  ps-1"> Forms </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/modal.html" target="_blank">
    <span class="sidenav-mini-icon"> M </span>
    <span class="sidenav-normal  ms-2  ps-1"> Modal </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/navs.html" target="_blank">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> Navs </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/navbar.html" target="_blank">
    <span class="sidenav-mini-icon"> N </span>
    <span class="sidenav-normal  ms-2  ps-1"> Navbar </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/pagination.html" target="_blank">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Pagination </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/popovers.html" target="_blank">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Popovers </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/progress.html" target="_blank">
    <span class="sidenav-mini-icon"> P </span>
    <span class="sidenav-normal  ms-2  ps-1"> Progress </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/spinners.html" target="_blank">
    <span class="sidenav-mini-icon"> S </span>
    <span class="sidenav-normal  ms-2  ps-1"> Spinners </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/tables.html" target="_blank">
    <span class="sidenav-mini-icon"> T </span>
    <span class="sidenav-normal  ms-2  ps-1"> Tables </span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link text-white " href="../../documentation/components/tooltips.html" target="_blank">
    <span class="sidenav-mini-icon"> T </span>
    <span class="sidenav-normal  ms-2  ps-1"> Tooltips </span>
    </a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <div class="sidenav-footer w-100 bottom-0 mt-2 ">
    <div class="mx-3">
    <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro-laravel" target="_blank" type="button">Buy Now</a>
    </div>
    <div class="mx-3">
    <a class="btn bg-gradient-primary w-100" href="../../documentation/getting-started/installation.html" target="_blank">View documentation</a>
    </div>
    <div class="mx-3">
    <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank">Get Free Version</a>
    </div>
    </div>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 850px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 632px;"></div></div></aside>

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
    </section>
    <!-- footer -->
        <div class="footer">
            <div class="wthree-copyright">
                <p>© 2023 All rights reserved | Copy by TrungDuc</p>
            </div>
        </div>
    <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="backend/js/bootstrap.js"></script>
<script src="backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="backend/js/scripts.js"></script>
<script src="backend/js/jquery.slimscroll.js"></script>
<script src="backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="backend/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="backend/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
