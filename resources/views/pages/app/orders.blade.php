@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
  <header class="container px-5 mt-4 d-flex justify-content-between align-items-center" id="breadcrumb">
    <h2 class="text-white fw-semibold">Orders</h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb text-white">
        <li class="breadcrumb-item"><a href="#" class="text-white text-decoration-none">Home</a></li>
        <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
      </ol>
    </nav>
  </header>
  <div class="container px-5 mt-4">
    <div class="row">
      <div class="col">
        <div class="bg-glass text-center text-white p-4">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Hello
                </td>
                <td>Otto</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <style>
      .table {
        --bs-table-bg: none;
        --bs-table-color: white;
      }
    </style>
  @endsection
