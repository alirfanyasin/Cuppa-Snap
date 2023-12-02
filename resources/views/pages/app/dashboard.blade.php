<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cuppa Snap - @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body>

  <main>
    <aside class="bg-glass-sidebar p-4">
      <header class="d-flex justify-content-center">
        <img src="{{ asset('assets/img/logo-second.png') }}" alt="" width="200px">
      </header>
      <ul class="mt-4">
        <li class="mb-2">
          <a href="" class="d-inline-block text-decoration-none text-white active">
            <div class="d-flex align-items-center"><iconify-icon icon="radix-icons:dashboard"
                width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Dashboard</span></div>
          </a>
        </li>
        <li class="mb-2">
          <a href="" class="d-inline-block text-decoration-none text-white">
            <div class="d-flex align-items-center"><iconify-icon icon="tabler:coffee"
                width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Menu</span></div>
          </a>
        </li>
        <li class="mb-2">
          <a href="" class="d-inline-block text-decoration-none text-white">
            <div class="d-flex align-items-center"><iconify-icon icon="mdi:cart-outline"
                width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Orders</span></div>
          </a>
        </li>
        <li class="mb-2">
          <a href="" class="d-inline-block text-decoration-none text-white">
            <div class="d-flex align-items-center"><iconify-icon icon="material-symbols:table-restaurant-outline"
                width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Table Number</span></div>
          </a>
        </li>
      </ul>
      <div class="position-absolute bottom-0">
        <iconify-icon icon="game-icons:coffee-beans" width="100%"
          style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
      </div>
    </aside>





  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  {{-- Iconify --}}
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>
