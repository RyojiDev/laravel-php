<?php
namespace App\Repositories;
use GuzzleHttp\Exception\Exception\RequestException;
use  GuzzleHttp \ Psr7 \Response;
use GuzzleHttp\Client;
use App\Http\Requests\StorePerson;


 class Clientes extends GuzzleHttpRequest{

     public function all(){
        
        return $this->get('clientes');
        $clientes = $clientes->tojSon();
        return view ('clientes' , compact ('clientes'));

        
  }

  public function postcliente()
  {
   
    
   
  }

    public function find($id){

      
    }

    
// }

 }