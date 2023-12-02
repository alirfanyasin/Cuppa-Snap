<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cuppa Snap - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
  </head>
  <body>
    <main class="d-flex align-items-center">
      <div class="container ">
        <div class="row d-flex justify-content-center">
          <div class="col-md-4">
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
                Don't have an accout? <a href="#" class="text-white text-decoration-none fw-semibold">Register</a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
     

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- Iconify --}}
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  </body>
</html>