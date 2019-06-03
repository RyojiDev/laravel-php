<?php
namespace App\Repositories;
use GuzzleHttp\Exception\Exception\RequestException;
use  GuzzleHttp \ Psr7 \Response;

use GuzzleHttp\Client;

// class Clientes extends GuzzleHttpRequest{

//     public function all(){
        
        return $this->get('clientes');
        $clientes = $clientes->tojSon();
        return view ('clientes' , compact ('clientes'));

        
//     }

    public function postCliente()
    
    {
        
        $client = new \GuzzleHttp\Client(["base_uri" => "http://localhost:8080/gestor_api"]);
        $options = [
            'json' => [
                "cnpj" => "84556852",
                "razao_social" => "deu certo",
                "nome_fantasia" => "kkkkk finalmente",
                "data_limite" => "2019-06-01"
               ]
           ]; 
        $response = $client->post("/cliente", $options);
        
        echo $response->getBody();
         
           //$response = $client->post("/cliente", $options)->getbody();
        
        // echo $response->getBody();
   
        // $request = $cliente->post('cliente', [
        //     'json' => [
        //         'cnpj' => 'MyNewDroplet',
        //         'razao_social' => 'ams2',
        //         'nome_fantasia' => '512mb',
        //         'data_limite' => 2019-05-01
        //     ]
        // ]);
        
        // $cliente = $request->json();
    
    // return $this->post('cliente')->$cliente->getbody();
    // $cliente = $cliente->tojson()->getbody();
     }

    public function find($id){
        return $this->get("clientes/{$id}");
    }

   
    
// }

// } -->