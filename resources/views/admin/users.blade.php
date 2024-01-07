@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="card-title">{{$title}}</h1>
            <a href="{{route('users.add')}}" class="btn btn-primary">Add User</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($users as $data)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                            @if ($data->is_role == 1)
                            <span class="badge bg-success">Admin</span>
                            @else
                            <span class="badge bg-primary">Customer</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <form action="{{route('users.delete', $data->id)}}" method="post">
                                    <a href="{{route('users.edit', $data->id)}}"
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