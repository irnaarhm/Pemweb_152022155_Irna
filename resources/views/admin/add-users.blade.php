@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$title}}</h1>
        <form class="row g-3" action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name">
            </div>
            <div class="col-12">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="col-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-12">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-12">
                <label class="form-label">Role</label>
                <select name="is_role" class="form-control">
                    <option value="" selected disabled>Choose...</option>
                    <option value="0">Customer</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection