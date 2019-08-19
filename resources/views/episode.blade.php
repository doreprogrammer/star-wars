<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('head')
    <title>Episode</title>
</head>

<body>

<header>
@include('header')
</header>

<section class="bg-dark vh-100 episode-container">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <img class="w-100" src="{{URL::asset('/images/').'/ep-'.$episode->episode_id.'.jpg'}}">
                    </div>
                    <div class="col-9 d-flex flex-column">
                        <div class="pt-3">
                        <h2 class="font-weight-light text-primary">
                        <i class="fas fa-film text-secondary"></i>
                        {{$episode->title}}</h2>
                        <p class="text-light mb-2">
                        <i class="fas fa-calendar-week"></i>
                        <span class="font-weight-bold">Fecha de estreno:</span> {{$episode->release_date}}</p>
                        <p class="text-light mb-2">
                        <i class="fas fa-user-tie"></i>
                        <span class="font-weight-bold">Director:</span> {{$episode->director}}</p>
                        <p class="text-light mb-2">
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="font-weight-bold">Productor:</span> {{$episode->producer}}</p>
                        </div>
                        <a href="/" class="btn btn-outline-warning mt-auto mr-auto" role="button" aria-pressed="true">
                        <i class="fas fa-chevron-left"></i>
                        Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<footer>
@include('footer')
</footer>




</body>
</html>
