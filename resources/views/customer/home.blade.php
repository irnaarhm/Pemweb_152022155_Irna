@extends('customer.layouts.customer')
<style>
    .card {
        display: block;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        transition: box-shadow .25s;
    }

    .card:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img-card {
        width: 100%;
        height: 200px;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        display: block;
        overflow: hidden;
    }

    .img-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: all .25s ease;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .card-title {
        margin-top: 0px;
        font-weight: 700;
        font-size: 1.65em;
    }

    .card-title a {
        color: #000;
        text-decoration: none !important;
    }

    .card-read-more {
        border-top: 1px solid #D4D4D4;
    }

    .card-read-more a {
        text-decoration: none !important;
        padding: 10px;
        font-weight: 600;
        text-transform: uppercase
    }

    .feature-box-1 {
        padding: 32px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        margin: 15px 0;
        position: relative;
        z-index: 1;
        border-radius: 10px;
        overflow: hidden;
        -moz-transition: ease all 0.35s;
        -o-transition: ease all 0.35s;
        -webkit-transition: ease all 0.35s;
        transition: ease all 0.35s;
        top: 0;
    }

    .feature-box-1 * {
        -moz-transition: ease all 0.35s;
        -o-transition: ease all 0.35s;
        -webkit-transition: ease all 0.35s;
        transition: ease all 0.35s;
    }

    /* .feature-box-1 .icon {
        width: 70px;
        height: 70px;
        line-height: 70px;
        background: #fc5356;
        color: #ffffff;
        text-align: center;
        border-radius: 50%;
        margin-bottom: 22px;
        font-size: 27px;
    } */

    .feature-box-1 .icon i {
        line-height: 70px;
    }

    .feature-box-1 h5 {
        color: #20247b;
        font-weight: 600;
    }

    .feature-box-1 p {
        margin: 0;
    }

    .feature-box-1:hover {
        top: -5px;
    }

    .feature-box-1:hover:after {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        left: 0;
        right: auto;
    }
</style>
@section('content')
<div class="p-5 text-center text-white"
    style="background: url('{{asset('assets/img/background.png')}}'); background-repeat: no-repeat; background-size: cover; background-position: center">
    <h1 class="display-5 fw-bold pt-5">Flower Store</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Welcome to Flower Store, where each bloom tells a story of beauty and grace. Let us
            accompany you through our garden of possibilities, as we work together to weave a tapestry of flowers that
            mirrors the poetry of your emotions.</p>
    </div>
</div>

<div class="bg-secondary-subtle py-3">
    <div class="container-fluid">
        <h2 class="text-center">Our Latest Products</h2>
        <div class="row">
            @foreach ($flower as $data)
            <div class="col-xs-12 col-sm-4">
                <div class="card">
                    <img src="{{asset('assets/img/flower/'.$data->image)}}" class="img-fluid" />
                    <div class="card-content">
                        <h4 class="card-title">
                            {{$data->name}}
                        </h4>
                        <p class="p-0 m-0">
                            {{$data->description}}
                        </p>
                        <p class="p-0 m-0">
                            Rp. {{ number_format($data->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="card-read-more">
                        <a href="{{route('order.detail', $data->id)}}" type="submit" style="text-decoration: none"
                            class="btn btn-link btn-block">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="/flower" class="btn btn-link" style="text-decoration: none;">More <i
                    class="bi bi-arrow-right-short" style="font-size: 20px"></i></a>
        </div>
    </div>
</div>
<div class="bg-white pt-3 pb-5">
    <div class="container-fluid">
        <h2 class="text-center">Service</h2>
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="bi bi-truck" style="font-size: 30px"></i>
                    </div>
                    <div class="feature-content">
                        <h5>On-Time Delivery</h5>
                        <p>Buyer and delivery will be done on the same day.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="bi bi-shield" style="font-size: 30px"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Protection</h5>
                        <p>Highly secure payment and delivery security</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="feature-box-1">
                    <div class="icon">
                        <i class="bi bi-flower1" style="font-size: 30px"></i>
                    </div>
                    <div class="feature-content">
                        <h5>Variety of flower choices</h5>
                        <p>A huge selection of flowers that are also guaranteed to be fresh.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection