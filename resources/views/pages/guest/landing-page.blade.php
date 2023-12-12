<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cuppa Snap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> --}}
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
            <a class="nav-link me-4 active" href="#">Home</a>
            <a class="nav-link me-4" href="#">About</a>
            <a class="nav-link me-4" href="#">Product</a>
            <a class="nav-link px-4 py-2 text-white rounded-pill"href="{{ route('login') }}"
              style="background-color: #532D1B">Login</a>
          </div>
        </div>
      </div>
    </nav>

    <section id="hero" style="height: 100vh">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-6">
            <h1 class="fw-bold" style="font-size: 40pt;">Life Begins After <span class="text-white">Coffee</span> <br>
              Indulge in the
              Essence
              of Good
              Mornings.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio inventore fuga
              nulla a aliquam eveniet
              voluptatum possimus nisi doloremque debitis?</p>
            <div class="my-5">
              <a href="{{ route('login') }}" class="text-white text-decoration-none px-5 py-3 rounded-pill"
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

    <section id="about">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-md-6 mb-3">
            <div>
              <img src="{{ asset('assets/img/img-about.png') }}" alt="img about" class="w-100">
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <header>
              <h2 class="fw-bold">About Us</h2>
              <h4>Why should you choose us?</h4>
            </header>
            <p>We're not just a place to enjoy a quality cup of coffee; we are a place where warmth, togetherness and
              the tempting aroma of coffee meet. Since the first day we opened our doors, Cuppa Snap has been a home
              for true coffee lovers and our loyal customers.
            </p>

            <p>
              Here, we don't just serve coffee. We create unforgettable coffee experiences. From the hand-picked
              coffee beans we grind every morning to every personal touch in every cup we serve, every second at Cuppa
              Snap is about flavor overload and precious moments.
            </p>

            <p>
              We invite you to join us at Cuppa Snap, a place where stories of coffee and friendship are made. Enjoy
              your cup of coffee of choice and feel the magic in every sip. Thank you for being part of our coffee
              journey.
            </p>
          </div>
        </div>
      </div>
    </section>


    <section id="product" class="pb-5" style="margin-top: 150px;">
      <div class="container">
        <header style="margin-bottom: 100px;">
          <h2 class="fw-bold">Our Product</h2>
          <h4>We provide quality coffee products</h4>
        </header>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="bg-glass text-center text-white py-4 px-3 position-relative">
              <div class="position-absolute" id="position-img-menu" style="margin-top: -100px;">
                <img src="{{ asset('assets/img/img-1.png') }}" alt="photo" class="mx-auto" width="65%">
              </div>
              <div class="text-white" style="margin-top: 60px; margin-bottom: 100px">
                <h4 class="fw-semibold" style="color: #532D1B;">Cappuccino</h4>
                <p class="fw-light" style="color: #532D1B;">Lorem ipsum dolor sit amet consectetur adipisicing
                  elit.
                  Doloremque deleniti non
                  praesentium deserunt</p>

                <div class="position-absolute w-100 px-3" style="bottom: 15px; left: 0; right: 0;">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5" style="color: #532D1B;">Rp. 30.000</span>
                    <span style="color: #532D1B;">245 Terjual</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <form action="" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: #532D1B;"><span
                          class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                          cart
                        </span></button>
                    </form>

                    <div>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                    </div>
                  </div>
                </div>
              </div>
              <div class="position-absolute" style="bottom: 0; right: 0;">
                <iconify-icon icon="game-icons:coffee-beans" width="90px"
                  style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="bg-glass text-center text-white py-4 px-3 position-relative">
              <div class="position-absolute" id="position-img-menu" style="margin-top: -100px;">
                <img src="{{ asset('assets/img/img-2.png') }}" alt="photo" class="mx-auto" width="65%">
              </div>
              <div class="text-white" style="margin-top: 60px; margin-bottom: 100px">
                <h4 class="fw-semibold" style="color: #532D1B;">Cappuccino</h4>
                <p class="fw-light" style="color: #532D1B;">Lorem ipsum dolor sit amet consectetur adipisicing
                  elit.
                  Doloremque deleniti non
                  praesentium deserunt</p>

                <div class="position-absolute w-100 px-3" style="bottom: 15px; left: 0; right: 0;">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5" style="color: #532D1B;">Rp. 30.000</span>
                    <span style="color: #532D1B;">245 Terjual</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <form action="" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: #532D1B;"><span
                          class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                          cart
                        </span></button>
                    </form>

                    <div>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                    </div>
                  </div>
                </div>
              </div>
              <div class="position-absolute" style="bottom: 0; right: 0;">
                <iconify-icon icon="game-icons:coffee-beans" width="90px"
                  style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="bg-glass text-center text-white py-4 px-3 position-relative">
              <div class="position-absolute" id="position-img-menu" style="margin-top: -100px;">
                <img src="{{ asset('assets/img/img-3.png') }}" alt="photo" class="mx-auto" width="65%">
              </div>
              <div class="text-white" style="margin-top: 60px; margin-bottom: 100px">
                <h4 class="fw-semibold" style="color: #532D1B;">Cappuccino</h4>
                <p class="fw-light" style="color: #532D1B;">Lorem ipsum dolor sit amet consectetur adipisicing
                  elit.
                  Doloremque deleniti non
                  praesentium deserunt</p>

                <div class="position-absolute w-100 px-3" style="bottom: 15px; left: 0; right: 0;">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5" style="color: #532D1B;">Rp. 30.000</span>
                    <span style="color: #532D1B;">245 Terjual</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <form action="" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: #532D1B;"><span
                          class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                          cart
                        </span></button>
                    </form>

                    <div>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                    </div>
                  </div>
                </div>
              </div>
              <div class="position-absolute" style="bottom: 0; right: 0;">
                <iconify-icon icon="game-icons:coffee-beans" width="90px"
                  style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="bg-glass text-center text-white py-4 px-3 position-relative">
              <div class="position-absolute" id="position-img-menu" style="margin-top: -100px;">
                <img src="{{ asset('assets/img/img-4.png') }}" alt="photo" class="mx-auto" width="65%">
              </div>
              <div class="text-white" style="margin-top: 60px; margin-bottom: 100px">
                <h4 class="fw-semibold" style="color: #532D1B;">Cappuccino</h4>
                <p class="fw-light" style="color: #532D1B;">Lorem ipsum dolor sit amet consectetur adipisicing
                  elit.
                  Doloremque deleniti non
                  praesentium deserunt</p>

                <div class="position-absolute w-100 px-3" style="bottom: 15px; left: 0; right: 0;">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fs-5" style="color: #532D1B;">Rp. 30.000</span>
                    <span style="color: #532D1B;">245 Terjual</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <form action="" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="text-white border-0 d-inline-block rounded-3"
                        style="padding: 10px 10px; background-color: #532D1B;"><span
                          class="d-flex justify-content-center align-items-center ">
                          <iconify-icon icon="tdesign:cart" width="25px"></iconify-icon> &nbsp;&nbsp; Add to
                          cart
                        </span></button>
                    </form>

                    <div>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-bold" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                      <iconify-icon icon="solar:star-line-duotone" width="20px" class="rating"></iconify-icon>
                    </div>
                  </div>
                </div>
              </div>
              <div class="position-absolute" style="bottom: 0; right: 0;">
                <iconify-icon icon="game-icons:coffee-beans" width="90px"
                  style="color: rgba( 255, 255, 255, 0.2);"></iconify-icon>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('assets/img/logo-second.png') }}" alt="" width="300px">
          </div>
          <div class="col-md-2">
            <div class="fs-5 fw-semibold">Quick Link</div>
            <div>
              <a href="" class="fw-light d-block text-decoration-none text-white">Home</a>
              <a href="" class="fw-light d-block text-decoration-none text-white">About</a>
              <a href="" class="fw-light d-block text-decoration-none text-white">Product</a>
              <a href="" class="fw-light d-block text-decoration-none text-white">Login</a>
              <a href="" class="fw-light d-block text-decoration-none text-white">Register</a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="fs-5 fw-semibold">Feature</div>
            <div>
              <div class="fw-light">Choice table number</div>
              <div class="fw-light">Easy Payment</div>
              <div class="fw-light">Simple Order</div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="fs-5 fw-semibold">Social Media</div>
            <div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="iconoir:instagram"
                  width="20px"></iconify-icon>&nbsp;&nbsp;Instagram</div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="iconoir:youtube"
                  width="20px"></iconify-icon>&nbsp;&nbsp;Youtube</div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="ant-design:facebook-outlined"
                  width="20px"></iconify-icon>&nbsp;&nbsp;Facebook</div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="fs-5 fw-semibold">Contact</div>
            <div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="ic:baseline-whatsapp"
                  width="20px"></iconify-icon>&nbsp;&nbsp;+62 878 5996
                7039</div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="carbon:email"
                  width="20px"></iconify-icon>&nbsp;&nbsp;cuppasnap@gmail.com</div>
              <div class="fw-light d-flex align-items-center"><iconify-icon icon="carbon:location"
                  width="20px"></iconify-icon>&nbsp;&nbsp;Jl. Anonym Blok J No. 32</div>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col text-center">
            <span class="fw-bold">Cuppa Snap</span> &copy; Copyright 2023
          </div>
        </div>
      </div>
    </footer>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  {{-- Iconify --}}
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>
