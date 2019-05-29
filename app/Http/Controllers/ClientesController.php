<?php

namespace App\Http\Controllers;

use App\Repositories\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $clientes;
    public function __construct(Clientes $clientes)
    {
        $this->clientes = $clientes;
    }

    public function indexView()
    {

        $clientes = $this->clientes->all();

        return view('clientes.clientes', compact('clientes'));

    }
    public function index()
    {

        //$clientes = $this->clientes->all();

        //return json_encode($clientes);

        $clientes = $this->clientes->all();
        return json_encode($clientes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes();
        $clientes->cnpj = $request->input('cnpjCliente');
        $clientes->razao_social = $request->input('razaoSocial');
        $clientes->nome_fantasia =$request->input('nomeFantasia');
        $clientes->data_limite =$request->input('dataLimite'); 
        $clientes->save();
        return json_encode($clientes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = $this->clientes->find($id);
        return view('clienteid', compact('clientes'));
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

    public function indexJson()
    {

        $clientes = $this->clientes->all();

        $clientes = json_encode($clientes);
        return $clientes;

    }
}
