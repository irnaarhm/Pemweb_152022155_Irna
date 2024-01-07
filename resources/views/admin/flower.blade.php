@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title">{{$title}}</h1>
            <a href="{{route('flower.add')}}" class="btn btn-primary">Add Flower</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($flower as $data)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>
                            <img src="{{asset('assets/img/flower/'.$data->image)}}" alt="Preview Gambar"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->price}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <form action="{{route('flower.delete', $data->id)}}" method="post">
                                    <a href="{{route('flower.edit', $data->id)}}"
                                        class="btn btn-warning btn-sm mx-1">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                </form>
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