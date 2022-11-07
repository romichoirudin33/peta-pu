<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Peta PU')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="icon" href="{{ asset('assets/pemprov-ntb.png') }}">
    <style>
        body {
            background-image: linear-gradient(180deg, #eee, #fff 100px, #fff);
        }
        .container {
            max-width: 960px;
        }
        .pricing-header {
            max-width: 700px;
        }
        .img-fluid{
            border-radius: 1em;
        }
    </style>
    @yield('css')
</head>
<body>
<div class="container">
    <header class="mt-5">
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="{{ asset('assets/pemprov-ntb.png') }}" alt="pemprov-ntb" style="height: 50px">
                <span class="ms-3">PU Pemprov NTB</span>
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Beranda</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('peta.index') }}">Peta</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('data.index') }}">Data</a>
                <a class="py-2 text-dark text-decoration-none" href="{{ route('capaian.index') }}">Capaian</a>
                @if(Auth::guest())
                    <a class="ms-5 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Login</a>
                @else
                    <div class="dropdown ms-5">
                        <a class="btn btn-link text-decoration-none dropdown-toggle shadow-none text-capitalize" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('login.reset_password') }}">Ganti Password</a></li>
                            <li><a class="dropdown-item" href="{{ route('login.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                @endif
            </nav>
        </div>
    </header>
    <main>
        @yield('contents')
    </main>
</div>
<footer class="py-4 pt-md-5 border-top bg-secondary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img class="mb-2" src="{{ asset('assets/dpupr-ntb.png') }}" alt="dpupr" >
                <small class="d-block mb-3 text-muted">&copy; 2022–{{ date('Y') }}</small>
            </div>
            <div class="col-md-4">
                <h5 class="mb-5">Tentang Kami</h5>
                <ul class="list-unstyled text-small">
                    <li class="mb-3">
                        <small>Jl. Majapahit No. 08</small><br>
                        Mataram, NTB
                    </li>
                    <li class="mb-1">
                        +62370 634479
                    </li>
                    <li class="mb-1">
                        dpu@ntbprov.go.id
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>
