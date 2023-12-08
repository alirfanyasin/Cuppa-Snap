<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  <style>

  </style>
</head>

<body>

  <main>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('assets/img/logo-primary.png') }}" alt="logo" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="ms-auto"></div>
          <div class="navbar-nav me-0">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Product</a>
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </div>
        </div>
      </div>
    </nav>

    <section id="hero" style="height: 100vh">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-6">
            <h1 class="fw-bold" style="font-size: 40pt; color: #532D1B;">Life Begins After <span
                class="text-white">Coffee</span> <br> Indulge in the
              Essence
              of Good
              Mornings.</h1>
            <p style="color: #532D1B;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore fuga
              nulla a aliquam eveniet
              voluptatum possimus nisi doloremque debitis?</p>
            <div class="my-5">
              <a href="" class="text-white text-decoration-none px-5 py-3 rounded-pill"
                style="background-color: #532D1B;">Shop Now</a>
            </div>

            <div class="d-flex">
              <div class="icon-menu p-2 rounded-3 me-3">
                <img src="{{ asset('assets/img/img-coffee-1.png') }}" alt="icon" width="100%">
              </div>
              <div class="icon-menu p-2 rounded-3 me-3">
                <img src="{{ asset('assets/img/img-coffee-2.png') }}" alt="icon" width="100%">
              </div>
              <div class="icon-menu p-2 rounded-3 me-3">
                <img src="{{ asset('assets/img/img-coffee-3.png') }}" alt="icon" width="100%">
              </div>
              <div class="icon-menu p-2 rounded-3 me-3">
                <img src="{{ asset('assets/img/img-coffee-4.png') }}" alt="icon" width="100%">
              </div>
            </div>
          </div>
          <div class="col-md-6  d-flex justify-content-center">
            <img src="{{ asset('assets/img/asset-img-1.png') }}" alt="coffee" width="90%">
          </div>
        </div>
      </div>
    </section>


    <div id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">

          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
