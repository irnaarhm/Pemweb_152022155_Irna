@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$title}}</h1>
        <form class="row g-3" action="{{route('flower.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description">{{old('description')}}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" name="price" value="{{old('price')}}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image" accept="image/*" onchange="previewImage(event)">
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img id="preview" src="{{asset('assets/img/default.png')}}" alt="Preview Gambar" class="img-fluid"
                    width="150">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('flower.index')}}" class="btn btn-danger">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection

<script>
    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('preview');

      var reader = new FileReader();

      reader.onload = function() {
        preview.src = reader.result;
      };

      reader.readAsDataURL(input.files[0]);
    }
</script>