@extends('layouts.app')
@section('title', 'Edit Menu')
@section('content')
  <header class="container mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Edit Menu</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Edit Menu</li>
      </ol>
    </nav>
  </header>
  <div class="container mt-4 responsive-content">
    <form action="{{ route('app.menu.update', $data->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="bg-glass p-4">
            <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control" id="name" placeholder="Coffee"
                value="{{ $data->name }}">
              <label for="name">Menu Name</label>
              @error('name')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                placeholder="Description"style="height: 130px" aria-valuetext="{{ $data->description }}">{{ $data->description }}</textarea>
              <label for="description">Description</label>
              @error('description')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="price" class="form-control" id="price" placeholder="0.000"
                value="{{ $data->price }}">
              <label for="price">Price</label>
              @error('name')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating">
              <select class="form-select" name="status" id="status" aria-label="Default select example">
                <option value="Available" {{ $data->status == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="Empty" {{ $data->status == 'Empty' ? 'selected' : '' }}>Empty</option>
              </select>
              <label for="status">Status</label>
              @error('status')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="mt-3">
            <button type="submit" onclick="notification()" class="border-0  rounded-3 text-white"
              style="padding: 10px 30px;background: rgba( 255, 255, 255, 0.3 );
              box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
              backdrop-filter: blur( 15.5px );
              -webkit-backdrop-filter: blur( 15.5px );">Update</button>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="bg-glass p-4">
            <div class="rounded-4 h-100">
              <img src="{{ asset('storage/menu/' . $data->image) }}" id="result" alt="no-photo"
                class="w-100 rounded-3">
              @error('image')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="" style="margin-top: -35px">
              <input type="file" name="image" class="form-control" onchange="readFile(this)"
                value="{{ $data->image }}">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script>
    // File Reader
    function readFile(input) {
      let file = input.files[0];
      let fileReader = new FileReader();
      fileReader.readAsText(file);
      fileReader.onload = function() {
        document.getElementById("result").src = URL.createObjectURL(file);
      };
      fileReader.onerror = function() {
        alert(fileReader.error);
      };
    }
  </script>
@endsection
