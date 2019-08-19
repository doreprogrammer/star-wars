<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
    <title>Personajes</title>
</head>
<body>
<header>
@include('header')
</header>
<section class="vh-100 bg-dark">
    <div class="container-fluid h-100 characters-container">
        <div class="row">
            <div class="col-12 text-center p-0">
                <div class="main-header h-100 w-100 d-flex flex-column align-items-center py-5">
                    <h1 class="mb-1 text-light font-weight-bold">Star Wars</h1>
                    <h2 class="copy-medium text-primary">Personajes</h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
    <div class="col-4">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach($characters as $character)
                <li data-target="#carousel" data-slide-to="{{$character->name}}" class="active"></li>
            @endforeach
            </ol>
            <div class="carousel-inner">
            @foreach($characters as $character)
                <div class="carousel-item">
                <img class="d-block border border-light mx-auto" src="{{URL::asset('/images/').'/'.$character->name.'.jpg'}}" width="200" alt="slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="bg-dark p-2">{{$character->name}}</h5>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>
    </div>
</section>

<script type="text/javascript">
$(document).ready(function () {
  $('#carousel').find('.carousel-item').first().addClass('active');
});
</script>

<footer>
@include('footer')
</footer>

</body>
</html>