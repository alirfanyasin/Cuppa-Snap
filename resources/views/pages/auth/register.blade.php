@extends('layouts.auth')
@section('title', 'Login')

@section('content')
  <form action="{{ route('register.post') }}" method="POST">
    @csrf
    <div class="bg-glass p-4">
      <div class="d-flex justify-content-center mb-3">
        <img src="{{ asset('assets/img/logo-second.png') }}" alt="" width="40%">
      </div>
      <div>
        <div class="form-floating mb-3">
          <input type="text" name="name" class="form-control" id="name" placeholder="Jhon Doe">
          <label for="name">Full Name</label>
          @error('name')
            <small class="text-white">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
          <label for="email">Email address</label>
          @error('email')
            <small class="text-white">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control" id="password" placeholder="*******">
          <label for="password">Password</label>
          @error('password')
            <small class="text-white">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="my-5">
        <button type="submit" class="btn-custom-secondary btn-button mb-3">REGISTER</button>
        <a href="{{ route('auth.google') }}" class="btn-custom-secondary btn-a text-decoration-none d-inline-block">
          <div class="d-flex justify-content-center align-items-center">
            <iconify-icon icon="devicon:google" width="30px"></iconify-icon>&nbsp;&nbsp; Login with Google
          </div>
        </a>
      </div>
      <div class="text-center text-white fw-light">
        You have an accout? <a href="{{ route('login') }}" class="text-white text-decoration-none fw-semibold">Login</a>
      </div>
    </div>
  </form>
@endsection
