<?php
namespace App\Repositories;
use GuzzleHttp\Exception\Exception\RequestException;
use  GuzzleHttp \ Psr7 \Response;
use GuzzleHttp\Client;

 class Clientes extends GuzzleHttpRequest{

     public function all(){
        
        return $this->get('clientes');
        $clientes = $clientes->tojSon();
        return view ('clientes' , compact ('clientes'));

        
  }

    public function postCliente() 


    { 
        # Home local  //$client = new \GuzzleHttp\Client(["base_uri" => "http://localhost:8080/gestor_api/cliente"]);
        
        $client = new \GuzzleHttp\Client(["base_uri" => "http://172.16.0.198:8080/gestor_api/cliente"]);
        // $options = [
        //     'json' => [
        // $client->cnpj = $request->input('cnpjCliente');
        // $client->razao_social = $request->input('razaoSocial');
        // $client->nome_fantasia = $request->input('nomeFantasia');
        // $client->data_limite = $request->input('dataLimite');
        // $client->save();
        // $request = $client->post("cliente");
        // $clientes = $this->clientes->postCliente();
        // return json_encode($client);
        // ]

        // ];

        
        $options = [
            'json' => [
             $response->cnpj->input('cnpjLimite'),
             $response->razao_social->input('razaoSocial'),
            $response->nome_fantasia->input('nomeFantasia'),
            $response->data_limite->input('dataLimite')
               ]
           ]; 

           
           
       $response = $client->post("cliente", $options);
        
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

 }