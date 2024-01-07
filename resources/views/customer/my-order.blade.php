@extends('customer.layouts.customer')
@section('content')
<div class="py-3" style="height: 100vh">
    <div class="container-fluid">
        <h2 class="text-center">My Order</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Flower Image</th>
                    <th>Flower Name</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($transaction as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->total_amount}}</td>
                    <td>
                        @if ($data->status == 0)
                        <span class="badge text-bg-warning">Awaiting Approval</span>
                        @elseif ($data->status == 1)
                        <form action="{{route('completed.order', $data->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Complete Order</button>
                        </form>
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
@endsection