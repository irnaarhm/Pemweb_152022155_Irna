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
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($stock as $data)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>
                            <img src="{{asset('assets/img/flower/'.$data->flower->image)}}" alt="Preview Gambar"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{$data->flower->name}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{route('stock.edit', $data->id)}}"
                                    class="btn btn-warning btn-sm mx-1">Edit</a>
                                <button class="btn btn-danger btn-sm mx-1">Delete</button>
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