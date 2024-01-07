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
</style>
@section('content')

<div class="py-3">
    <div class="container-fluid">
        <h2 class="text-center">Our Flowers</h2>
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
                        <a href="{{route('order.detail', $data->id)}}" style="text-decoration: none"
                            class="btn btn-link btn-block">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection