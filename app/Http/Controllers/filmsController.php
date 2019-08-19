<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class filmsController extends Controller
{

    private $films;

    /**
     * Llamadas a la api de star wars de films
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilms()
    {         
    	$client = new Client();
    	$response = $client->request('GET', 'https://swapi.co/api/films/');
    	$statusCode = $response->getStatusCode();
        // $films = $response->getBody()->getContents();
        $films = json_decode($response->getBody());
        $films = $films->results; 
        return $films;
    }

    /**
     * Display peliculas.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFilms()
    {
        $films=$this->getFilms();
        return view('films' , compact("films"));
    }
    

    /**
     * Display detalle de episodio.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEpisode($id)
    {
        
        $films=$this->getFilms();

        foreach($films as $episode)
        {
            if($episode->episode_id == $id)
            {
                //guardar en sesion los titulos de las páginas visitadas
                $link_title = $episode->title;
                $link_id = $episode->episode_id;
  
                if( !Session::get('links.title')){
                    $links=array();
                   Session::put('links.title', $links);
                }
                $links = Session::get('links.title');
                array_push($links , $link_title);
                $links = array_unique($links);
                Session::put('links.title', $links);
                
                  
                     
         
                return view('episode', compact("id" , "episode"));
            }
        } 
    }

   /**
     * Buscador de peliculas.
     *
     * @return \Illuminate\Http\Response
     */     
    public function searchFilms(Request $request)
    {
        if($request->ajax())
        {
            $films = $this->getFilms();
            $output="";

            foreach($films as $episode)
            {
                //titulo de la pelicula
                $t = $episode->title;
                //caracteres a buscar en el titutlo
                $findme   = $request->get("search");
                //controlamos espacios
                if($findme == null | $findme == "")
                exit;
                //control de la posicion
                $pos = stripos($t, $findme);
                if ($pos !== false) {
                    // echo "La cadena '$findme' fue encontrada en la cadena '$t'";
                    // echo " y existe en la posición $pos";
                    $output.='<div class="col-3 p-2">'.
                    '<a class="d-inline-block" id="'.$episode->episode_id.'" href="episode/'.$episode->episode_id.'">'.
                    '<div class="film-img episode-'.$episode->episode_id.'"></div>'.
                    '<span class="text-dark font-weight-bold d-block mt-2">'.$episode->title.'</span></a>'.
                    '</div>';

                } else {
                    // echo "La cadena '$findme' no fue encontrada en la cadena '$t'";
                    $output.= "";
                }

            }
            if($output=="")
            $output.= "<span class='d-block p-2'>No hay resultados</span>";
            return Response($output);
        }
    }    
    
}
