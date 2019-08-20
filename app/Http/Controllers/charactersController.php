<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    
/**
     * Llamadas a la api de star wars de films
     *
     * @return \Illuminate\Http\Response
     */
    public function getCharacters()
    {         
    	$client = new Client();
    	$response = $client->request('GET', 'https://swapi.co/api/people/');
    	$statusCode = $response->getStatusCode();
        // $films = $response->getBody()->getContents();
        $films = json_decode($response->getBody());
        $films = $films->results; 
        return $films;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCharacters()
    {
        $characters=$this->getCharacters();
        return view('characters' , compact("characters"));
       
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCharactersCarousel(){

    }
}
