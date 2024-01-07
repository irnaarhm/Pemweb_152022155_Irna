@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title">{{$title}}</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Flower</th>
                        <th scope="col">Name Customer</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($transaction as $data)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->total_amount}}</td>
                        <td>{{$data->phone}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <form action="{{route('send.flower', $data->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm mx-1">Send Flower</button>
                                </form>
                                <button class="btn btn-danger btn-sm mx-1">Decline</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection