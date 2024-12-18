@extends('layouts/layout')

@section('content')
    <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">Sofia
                <svg fill="#000000" height="34px" width="34px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 478.165 478.165" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M43.678,169.368c14.463,2.806,25.418,15.561,25.418,30.832v41.203H228.93V85.554H52.788c-3.854,0-7.593,1.588-10.258,4.355 c-2.421,2.515-3.685,5.735-3.557,9.067c0.507,13.321,2.088,36.973,4.707,70.385L43.678,169.368z"></path> <path d="M440.48,189.084c-6.129,0-11.115,4.986-11.115,11.115v45.392c8.971,5.285,15.008,15.04,15.008,26.183v36.833 c0,2.489-0.158,4.948-0.88,7.221c-1.883,5.926-5.773,14.689-15.294,19.616l13.03,49.595c1.197,4.557,5.308,7.572,9.809,7.572 c0.853,0,1.721-0.108,2.586-0.336c5.421-1.424,8.661-6.974,7.237-12.394l-15.557-59.211h10.994c6.019,0,10.802-4.992,11.127-11.612 c1.297-26.445,9.775-100.909,10.741-109.347c-0.256-5.903-5.139-10.627-11.104-10.627H440.48z"></path> <path d="M11.104,189.084c-5.965,0-10.848,4.724-11.104,10.627c0.965,8.438,9.442,82.902,10.739,109.347 c0.325,6.62,5.109,11.612,11.128,11.612h10.992l-15.554,59.211c-1.424,5.421,1.817,10.97,7.237,12.394 c0.864,0.227,1.732,0.336,2.586,0.336c4.5,0,8.611-3.016,9.809-7.573l13.028-49.594c-8.813-6.659-14.183-14.397-15.294-19.608 c-0.498-2.335-0.882-4.737-0.882-7.23v-36.833c0-11.146,6.039-20.902,15.012-26.186v-45.389c0-6.129-4.986-11.115-11.115-11.115 H11.104z"></path> <path d="M409.069,200.199c0-15.268,10.952-28.021,25.412-30.83l-0.002-0.006c2.618-33.412,4.2-57.066,4.707-70.386 c0.127-3.333-1.137-6.553-3.559-9.068c-2.664-2.767-6.402-4.354-10.257-4.354H249.228v155.849h159.841V200.199z"></path> <path d="M414.002,261.7H64.158c-5.554,0-10.073,4.519-10.073,10.074v36.833c0,3.35,1.65,6.315,4.174,8.148l0.008-0.001 c0.041,0.03,0.076,0.065,0.117,0.095c1.636,1.15,3.626,1.832,5.774,1.832h349.844c2.147,0,4.135-0.68,5.771-1.829 c0.042-0.031,0.078-0.068,0.121-0.098l0.009,0.001c2.523-1.832,4.173-4.797,4.173-8.147v-36.833 C424.076,266.219,419.557,261.7,414.002,261.7z"></path> </g> </g></svg></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Тицяй
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">Голосування</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Про Ігора (в розробці)</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Про Сіджея (в розробці)</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">TESTING CI/CD</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Приймаємо ваші ставки на цю зиму</h2>
                    <a class="btn btn-dark" href="#about">START</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <form action="{{ route('vote') }}" method="post">
                @csrf
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4 custom-text">ГОЛОСУЙ!</h2>
                        <div style="display: flex; justify-content: center">
                            <button class="pushable" name="vote" value="igor" style="margin-right: 50px;">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front"> IGOR </span>
                            </button>
                            <button class="pushable" name="vote" value="sidjey">
                                <span class="shadow"></span>
                                <span class="edge"></span>
                                <span class="front"> SIDJEY </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table" style="--bs-table-color: white; margin-top:25px;">
                <thead>
                <tr>
                    <th scope="col">IGOR</th>
                    <th scope="col">SIDJEY</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                <tr>
                    <td>{{ $votesIgor }}</td>
                    <td>{{ $votesSidjey }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        @if ($errors->has('error'))
            <div class="alert alert-danger" style="max-width: 70%; margin: 0 auto">
                {{ $errors->first('error') }}
            </div>
        @endif

        @if ($errors->has('vote'))
            <div class="alert alert-danger" style="max-width: 70%; margin: 0 auto">
                {{ $errors->first('vote') }}
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success" style="max-width: 70%; margin: 0 auto">
                {{ session('message') }}
            </div>
        @endif
        <div class="container px-4 px-lg-5" style="margin-top: 100px;">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Що ще можна добавити на сайт?</h2>
                    <form class="form-signup" id="contactForm" action="{{route('offers')}}" method="post">
                        @csrf
                        <div class="row input-group-newsletter" style="display: flex;flex-direction: column">
                            <div class="col" style="margin-bottom: 20px"><input class="form-control" id="text" type="text" name="offer" placeholder="Ваші пропозиції..." style="height: 65px" /></div>
                            <div class="col-auto"><button class="btn btn-primary" id="submitButton" type="submit">Відправити!</button></div>
                        </div>
                    </form>
                </div>
                @error('offer')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
                @if (session('messageoffers'))
                    <div class="alert alert-success" style="max-width: 70%; margin: 0 auto; margin-top:30px;">
                        {{ session('messageoffers') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <counter></counter>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">Молодша школа, Lviv UA</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">sofia@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+7 (777) 777-7777</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">IGOR &copy; SIDJEY SOON 2025</div></footer>
@endsection
