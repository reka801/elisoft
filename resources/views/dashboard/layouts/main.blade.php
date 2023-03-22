{{-- <h1>Welcome, Reka</h1> --}}

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reka | Elisoft</title>

  {{-- bootsrap core css --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  {{-- bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">

  {{-- trix editor --}}
  <link rel="stylesheet" type="text/css" href="/css/trix.css">

  {{-- menghilangkan fitur upload di trix agar aman dan tidak disalah unakan oleh pengguna --}}
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
  </style>

</head>

<body>

  @include('dashboard.layouts.header')

  <div class="container-fluid">
    <div class="row">
      @include('dashboard.layouts.sidebar')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('container')
      </main>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  {{-- include feather icon --}}
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
  </script>
  <script src="/js/dashboard.js"></script>

  {{-- trix editor --}}
  <script type="text/javascript" src="/js/trix.js"></script>
</body>

</html>