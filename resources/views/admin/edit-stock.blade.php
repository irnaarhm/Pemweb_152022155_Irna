@extends('admin.layouts.layout')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title">{{$title}}</h1>
        <form class="row g-3" action="{{route('stock.update', $stock->id)}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" readonly disabled value="{{$stock->name}}">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" readonly disabled>{{$stock->name}}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" readonly disabled value="{{$stock->price}}">
                </div>
                <div class="col-12">
                    <label class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" value="{{$stock->quantity}}"
                        pattern="[0-9]*">
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-baseline">
                <div>
                    <h6>Flower Image</h6>
                    <img src="{{asset('assets/img/flower/'.$stock->image)}}" alt="Preview Gambar" class="img-fluid"
                        width="150">
                </div>
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