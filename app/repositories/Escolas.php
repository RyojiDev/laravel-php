<?php

//namespace App\Repositories;

use GuzzleHttp\Client;

class Escolas extends GuzzleHttpRequest

{
    
    public function all()
    {    
            
           return $this->get('escolas');
    }
    public function find($id)
    {
      return $this->get("escolas/{$id}");
      
    }

    
}