<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('head')
    <title>films</title>
</head>
<body>
<header>
@include('header')
</header>
<section class="vh-100 bg-dark">
    <div class="container-fluid searcher-container h-100">
        <div class="row h-100">
            <div class="col-12 text-center p-0">
                <div class="main-header h-100 w-100 d-flex flex-column align-items-center py-5">
                    <h1 class="mb-1 text-light font-weight-bold">Star Wars</h1>
                    <h2 class="copy-medium text-primary">Buscador de películas</h2>
                    <div class="mt-3 w-50 d-flex">
                        <input id="search" class="form-control" type="search" name="search" placeholder="Escribe para buscar películas (en inglés)" autocomplete="off">              
                    </div>
                    <!--Mostrar los datos del buscador Live-->
                    <div class="result w-50 row bg-light rounded"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- <ul>
@foreach($films as $film)
    <li><a href="episode/{{$film->episode_id}}">{{$film->title}}</a></li>
@endforeach
</ul> -->
<section>
    <div class="container-fluid bg-light align-items-center py-5">
        <div class="row h-100">
            <div class="col-12 text-center p-0">
                <h2 class="copy-medium text-primary text-dark">Páginas de películas visitadas anteriormente</h2>
                @if(Session::get('links.title'))
                @foreach(Session::get('links.title') as $link)
                <div class="links_visited"><span>{{$link}}</span></div>
                @endforeach
                @endif
                
            </div>
        </div>
    </div>
</section>

<footer>
@include('footer')
</footer>

<!--AJAX para el buscador-->
<script type="text/javascript">
var timeout = null;
$('#search').on('keyup',function(){
    //limpiar el timeout si existe
    if(timeout){ clearTimeout(timeout);}
    //crear timeout para las busquedas 
    timeout = setTimeout(function() {
        $value=$('#search').val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('.result').html(data);
            }
        });
    },200);
})
</script>
<!--validador del token para asegurar la ejecucion-->
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>


</body>
</html>