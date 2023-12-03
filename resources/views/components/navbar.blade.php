<nav class="navbar px-5 py-3" id="navbar">
  <div class="container-fluid">
    <div class="me-0"></div>
    <div class="d-flex align-items-center">
      @role('pelanggan')
        <a href="{{ route('carts') }}" class="text-white text-decoration-none me-4 position-relative">
          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon>
          @if (session('cart_count') > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              {{ session('cart_count') ?? 0 }}
              <span class="visually-hidden">unread messages</span>
            </span>
          @endif
        </a>
      @endrole
      <div class="name me-3" href="#">
        Welcome, <span class="fw-semibold">{{ Auth::user()->name }}</span>
      </div>
      <div class="dropdown">
        <button type="button" class="bg-transparent border-0" data-bs-toggle="dropdown" aria-expanded="false">
          <div class="overflow-hidden rounded-pill" style="width: 40px; height: 40px; border: 3px solid #5a1f06;">
            <img src="{{ asset('assets/img/photo-profile.jpg') }}" alt="photo-profile" width="100%">

          </div>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li>
            <form action="{{ route('logout') }}" method="POST" class="d-inline-block  dropdown-item">
              @csrf
              <button type="submit" class="bg-transparent border-0" href="#">Logout</button>
            </form>
          </li>
        </ul>

      </div>
    </div>
  </div>
</nav>
