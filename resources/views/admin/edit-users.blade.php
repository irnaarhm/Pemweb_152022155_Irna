@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$title}}</h1>
        <form class="row g-3" action="{{route('users.update', $users->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name"
                    value="{{old('first_name', $users->first_name)}}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name"
                    value="{{old('last_name', $users->last_name)}}">
            </div>
            <div class="col-12">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="{{old('phone', $users->phone)}}">
            </div>
            <div class="col-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email', $users->email)}}">
            </div>
            <div class="col-12">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-12">
                <label class="form-label">Role</label>
                <select name="is_role" class="form-control">
                    <option value="" selected disabled>Choose...</option>
                    <option value="0" {{$users->is_role == 0 ? 'selected' : '' }}>Customer</option>
                    <option value="1" {{$users->is_role == 1 ? 'selected' : '' }}>Admin</option>
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