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
                        <th scope="col">Flower Image</th>
                        <th scope="col">Name Customer</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Status</th>
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
                        <td><img src="{{asset('assets/img/flower/'.$data->image)}}" alt="Preview Gambar"
                                class="img-fluid" width="100"></td>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->total_amount}}</td>
                        <td>
                            @if ($data->status == 0)
                            <span class="badge text-bg-warning">Awaiting Approval</span>
                            @elseif ($data->status == 1)
                            <span class="badge text-bg-primary">On Delivery</span>
                            @else
                            <span class="badge text-bg-success">Completed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection