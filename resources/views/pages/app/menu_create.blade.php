@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container px-5 mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Create Menu</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Create Menu</li>
      </ol>
    </nav>
  </header>
  <div class="container px-5 mt-4">
    <form action="" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-8 mb-3">
          <div class="bg-glass p-4">
            <div class="form-floating mb-3">
              <input type="text" name="name" class="form-control" id="name" placeholder="Coffee">
              <label for="name">Menu Name</label>
              @error('name')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                placeholder="Description"style="height: 130px"></textarea>
              <label for="description">Description</label>
              @error('description')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-floating mb-3">
              <input type="number" name="price" class="form-control" id="price" placeholder="0.000">
              <label for="price">Price</label>
              @error('name')
                <small class="text-white">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="mt-3">
            <button type="button" onclick="notification()" class="border-0  rounded-3 text-white"
              style="padding: 10px 30px;background: rgba( 255, 255, 255, 0.3 );
              box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
              backdrop-filter: blur( 15.5px );
              -webkit-backdrop-filter: blur( 15.5px );">Submit</button>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="bg-glass p-4">
            <div class="rounded-4">
              <img src="{{ asset('assets/img/no-photo.jpg') }}" alt="no-photo" class="w-100 rounded-3">
            </div>
            <input type="file" class="form-control mt-3">
          </div>
        </div>
      </div>
    </form>
  </div>

  <script>
    function notification() {
      toast('🦄 Wow so easy!', {
        position: "top-right",
        autoClose: 5000,
        hideProgressBar: false,
        closeOnClick: true,
        pauseOnHover: true,
        draggable: true,
        progress: undefined,
        theme: "light",
      });
    }
  </script>
@endsection
