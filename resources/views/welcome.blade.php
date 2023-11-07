<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Libertus - Home Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Poppins:wght@400;500;700;800;900&display=swap");
    * { color: rgb(5 150 105) !important; font-family: "Poppins", sans-serif; font-size: 14px; }
    .navbar-brand { font-family: "Homemade Apple", cursive; font-weight: 900; font-size: 25px; color: rgb(22 78 99) !important; }
    .md-name { font-family: "Homemade Apple", cursive; font-weight: 900; font-size: 25px; }
    @media only screen and (max-width: 600px) {
    body {
        background-color: lightblue;
      }
    img {
      width: 100%;
    }
    }
  </style>
</head>

<body class="antialiased">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="#">Code<span class="md-name"> Lin</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item ml-5">
            <a class="nav-link" href="#">Github</a>
          </li>
            @if (Route::has('login'))
              <li class="nav-item d-flex">
                @auth
                  <a href="{{ url('/home') }}" class="nav-link">Home</a>
                  @else
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                  @endif
                @endauth
              </li>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Conntent -->
  <main>
    <div class="container py-4">
      <div class="p-5 mb-4 bg-body-tertiary rounded-3">
        <div class="container py-5">
          <div class="row">
            <div class="col-lg-9 col-md-6 mb-3">
              <h1 class="fw-bold">About Me</h1>
              <p class="col-md-8 fs-6" style="text-align: justify">
                Hi, nama
                <span class="text-black fw-bold">Libertus</span> biasanya di
                panggil dengan sebutan
                <span class="text-black">Bert</span> atau
                <span class="text-black">Lin</span>. Saat ini saya sedang
                mempelajari teknologi untuk menjadi seorang Fullstack Web
                Developer di salah satu perusahaan IT yang ada di daerah
                Yogyakarta yakni
                <span><a href="https://eduwork.id" class="text-black text-decoration-none" target="_blank">Eduwork.id
                    <i class="bi bi-box-arrow-in-up-right text-black"></i></a></span>
              </p>
              <button type="button" class="px-5 border-1 py-1 rounded">
                <a href="https://github.com/libertus-lin/" target="_blank" class="text-decoration-none">Explore More &nbsp;
                  <i class="bi bi-box-arrow-in-up-right"></i></a>
              </button>
            </div>
            <div class="col-lg-2 col-md-6">
              <img src="{{ asset('assets/img/myprofile.jpg') }}" class="img-fluid rounded-circle" alt="libertus">
            </div>
          </div>
        </div>
      </div>

      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <!-- Card -->
          <div class="card mb-3 p-2">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="https://eduwork.id/storage/user/51/thumb/Frame%20433-min.png" class="img-fluid rounded-1"
                  alt="eduwork" width="200" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Laravel + Vue Js</h5>
                  <p class="card-text">
                    Disini saya berfokus pada materi <b>Fullstack Web Developer</b>
                    dengan mempelajari tentang materi
                    <span class="text-black">Laravel + Vue Js</span>. Disini
                    kami diajarkan dari awal hingga mahir.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card mb-3 p-2">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('assets/img/mycode.png') }}" class="img-fluid rounded-1" alt="my code" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Hasil Belajar</h5>
                  <p class="card-text">
                    Barikut ini adalah hasil belajar saya di
                    <span><a href="https://eduwork.id" class="text-black text-decoration-none"
                        target="_blank">Eduwork.id
                        <i class="bi bi-box-arrow-in-up-right text-black"></i></a></span> terkait
                    <span class="text-black">Laravel + Vue Js</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <footer class="py-3 my-4">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Github</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Instagram</a></li>
          </ul>
          <p class="text-center text-body-secondary">Created by 2023 Libertus, Mentawai</p>
        </footer>
      </div>
    </div>
  </main>

  <!-- Library Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
