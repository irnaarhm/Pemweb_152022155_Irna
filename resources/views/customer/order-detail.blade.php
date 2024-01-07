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
    <div class="container">
        <h2 class="py-2 text-center">Order Detail</h2>
        <form action="{{route('order.flower', $flower->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <table>
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td>Flower Name</td>
                                <td>: {{$flower->name}}</td>
                            </tr>
                            <tr>
                                <td>Flower Description</td>
                                <td>: {{$flower->description}}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td><input type="number" name="quantity" id="quantity" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-success">Order</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Flower Image</h5>
                    <img src="{{asset('assets/img/flower/'.$flower->image)}}" class="img-fluid" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection