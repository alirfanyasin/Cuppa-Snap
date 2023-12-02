@extends('layouts.auth')
@section('title', 'Login')

@section('content')
  <form action="">
    <div class="bg-glass p-4">
      <div class="d-flex justify-content-center mb-3">
        <img src="{{ asset('assets/img/logo-second.png') }}" alt="" width="40%">
      </div>
      <div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="email" placeholder="name@example.com">
          <label for="email">Email address</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="password" placeholder="*******">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="my-5">
        <button class="btn-custom-secondary btn-button mb-3">LOGIN</button>
        <a href="#" class="btn-custom-secondary btn-a text-decoration-none d-inline-block">
          <div class="d-flex justify-content-center align-items-center">
            <iconify-icon icon="devicon:google" width="30px"></iconify-icon>&nbsp;&nbsp; Login with Google
          </div>
        </a>
      </div>
      <div class="text-center text-white fw-light">
        Don't have an accout? <a href="{{ route('register') }}"
          class="text-white text-decoration-none fw-semibold">Register</a>
      </div>
    </div>
  </form>
@endsection
