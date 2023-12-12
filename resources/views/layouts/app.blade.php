<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

  @stack('script-head')


  <title>Cuppa Snap - @yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  {{-- <link rel="stylesheet" href="{{ url('node_modules/react-toastify/dist/ReactToastify.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

  <script></script>
</head>

<body>

  <main class="d-flex">
    @include('components.sidebar')

    <section id="content">
      @include('components.navbar')

      @yield('content')
    </section>
  </main>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  @stack('script-body')

  {{-- Iconify --}}
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  {{-- <script src="{{ url('node_modules/react-toastify/dist/react-toastify.js') }}"></script> --}}
</body>

</html>
