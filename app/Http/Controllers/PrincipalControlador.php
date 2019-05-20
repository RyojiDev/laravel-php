<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalControlador extends Controller
{
    public function principal (){
        return view ('principal');
    }
}
