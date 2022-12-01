<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Peta PU')</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/pemprov-ntb.png') }}">
    <style>
        body {
            /*background-image: linear-gradient(180deg, #2980b9, #fff 100px, #fff);*/
            background-image: linear-gradient(180deg, #151e72, #f1c40f 200px, #f1c40f);
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
<div>
    <div class="text-white py-2 px-5">
        <small>{{ \Carbon\Carbon::now()->locale('id')->format('d F Y') }}</small>
    </div>
</div>
<header class="bg-white">
    <div class="d-flex flex-column flex-md-row align-items-center mb-1 mx-3 p-2 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <img src="{{ asset('assets/pemprov-ntb.png') }}" alt="pemprov-ntb" style="height: 50px; margin-right: 1.5em; margin-left: 1.5em">
            <img src="{{ asset('assets/pu.png') }}" alt="pu" style="height: 40px">
            <span class="ms-3 fw-bold" style="line-height: 1">
                    Dinas Pekerjaan Umum<br> dan Penataan Ruang <br> Provinsi Nusa Tenggara Barat
                </span>
        </a>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none {{ (request()->is('/')) ? 'fw-bold' : '' }}" href="{{ route('home') }}">Beranda</a>
            <a class="me-3 py-2 text-dark text-decoration-none {{ (request()->is('peta*')) ? 'fw-bold' : '' }}" href="{{ route('peta.index') }}">Peta</a>
            <a class="me-3 py-2 text-dark text-decoration-none {{ (request()->is('data*')) ? 'fw-bold' : '' }}" href="{{ route('data.index') }}">Data</a>
            <a class="py-2 text-dark text-decoration-none {{ (request()->is('capaian*')) ? 'fw-bold' : '' }}" href="{{ route('capaian.index') }}">Capaian</a>
            @if(Auth::guest())
                <a class="ms-5 py-2 text-dark text-decoration-none {{ (request()->is('login*')) ? 'fw-bold' : '' }}" href="{{ route('login') }}">Login</a>
            @else
                <div class="dropdown ms-5">
                    <a class="btn text-decoration-none dropdown-toggle shadow-none text-capitalize" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
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
<main class="bg-white py-3">
    <div class="container">
        @yield('contents')
    </div>
</main>
<footer class="py-4 pt-md-5 border-top text-white mt-5" style="background-color: #151e72">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 offset-2">
{{--                <img class="mb-2" src="{{ asset('assets/dpupr-ntb.png') }}" alt="dpupr" >--}}
{{--                <small class="d-block mb-3 text-muted">&copy; 2022–{{ date('Y') }}</small>--}}
                <h5>Tentang Kami</h5>
            </div>
            <div class="col-md-4">
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
<div class="text-center py-3">
    2022-{{ date('Y') }} &copy; Dinas Pekerjaan Umum dan Penataan Ruang Provinsi Nusa Tenggara Barat
</div>

<!-- <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>
