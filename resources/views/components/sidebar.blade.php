<aside class="bg-glass-sidebar p-4">
  <header class="d-flex justify-content-center">
    <img src="{{ asset('assets/img/logo-second.png') }}" alt="" width="200px">
  </header>
  <ul class="mt-4">
    <li class="mb-2">
      <a href="{{ route('app.dashboard') }}"
        class="d-inline-block text-decoration-none text-white {{ Request::is('app/dashboard') ? 'active' : '' }}">
        <div class="d-flex align-items-center"><iconify-icon icon="radix-icons:dashboard"
            width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Dashboard</span></div>
      </a>
    </li>
    <li class="mb-2">
      <a href="{{ route('app.menu') }}"
        class="d-inline-block text-decoration-none text-white {{ Request::is('app/menu') ? 'active' : '' }}">
        <div class="d-flex align-items-center"><iconify-icon icon="tabler:coffee"
            width="30px"></iconify-icon>&nbsp;&nbsp;&nbsp;<span class="fs-5">Menu</span></div>
      </a>
    </li>
    <li class="mb-2">
      <a href="{{ route('app.orders') }}"
        class="d-inline-block text-decoration-none text-white {{ Request::is('app/orders') ? 'active' : '' }}">
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
