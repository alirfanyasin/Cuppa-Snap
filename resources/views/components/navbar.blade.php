<nav class="navbar px-5 py-3" id="navbar">
  <div class="container-fluid">
    <div class="me-0"></div>
    <div class="d-flex align-items-center">
      <div class="name me-3" href="#">Welcome, <span class="fw-semibold">{{ Auth::user()->name }}</span></div>
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
