<?php

namespace App\Repositories;
use GuzzleHttp\Client;

class Clientes extends GuzzleHttpRequest{

    public function all(){
        
        return $this->get('clientes');
        $clientes = $clientes->tojSon();
        return view ('clientes' , compact ('clientes'));

        return $this->post('clientes');
        $clientes = $clientes->tojSon();
        return view ('clientes' , compact ('clientes'));
        
    }

    public function find($id){
        return $this->get("clientes/{$id}");
    }

}