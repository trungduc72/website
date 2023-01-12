@extends('layout')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href={{ route('home') }}>Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="alert alert-success" role="alert">
            <p>Cảm ơn bạn đã đặt hàng!</p>
        </div>
    </section>
    <!--/#cart_items-->
@endsection
