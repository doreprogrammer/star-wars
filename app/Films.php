<?php

namespace App;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Films
{
protected $films;
    /**
     * Llamadas a la api de star wars de films
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {         

    	$client = new Client();
    	$response = $client->request('GET', 'https://swapi.co/api/films/');
    	$statusCode = $response->getStatusCode();
        // $films = $response->getBody()->getContents();
        $films = json_decode($response->getBody());
        $films = $films->results; 

        return $films;
    }
    
}
