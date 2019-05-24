<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Http\Client;
use App\Repositories\Cliente;

class PrincipalControlador extends Controller
{
    public function principal (){
        return view ('principal');
    }
}
