<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Clientes;
use GuzzleHttp\Client;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $clientes;
    public function __construct(Clientes $clientes){
   
        $this->clientes = $clientes;
    }

    public function indexdetailCliente()
    {
        return view ('clientes.clientes-detail');
    }

    public function indexView()
    {

        $clientes = $this->clientes->all();

        return view('clientes.clientes', compact('clientes'));

    }
    public function index()
    {

        $clientes = $this->clientes->all();

        return json_encode($clientes);

        //$clientes = $this->clientes->all();
        
        //return json_encode($clientes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.clientes-novo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $dataForm = $request->except('_token');

    //     $guzzle = new Client;
      
    //   $result =  $guzzle->POST(env('URL_API').'/cliente',[
    //         'headers'=> ['Content-Type' => 'application/json'],
            
            
    //         'json' => $dataForm,
            

    //     ]);
    //     json_decode($result->getBody());

    // $input = $request->all();

    //     return response()->json(['success'=>'Got Simple Ajax Request.']);


    $dataForm = $request->except('_token');

    $guzzle = new Client;

    $result = $guzzle->POST(env('URL_API').'/cliente',[
        'headers'=> ['Content-Type' => 'application/json'],

        'json' => $dataForm,
    ]);
    //dd(json_decode($result->getbody()));
    return redirect()->action('ClientesController@indexView');
    }
        
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function show($id)
    {
        $client = new Client([
            'base_uri'=> 'http://172.16.0.198:8080/gestor_api/',
        ]);

        $response = $client->request('GET',"escolas/{id}");
        $clientes = json_decode( $response->getBody()->getContents());

        return view('clientes.clientes-detail', compact('clientes-detail'));
        // $clientes = $this->clientes->find($id);
        // return view('clientes.clientes-detail', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}

