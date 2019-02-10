<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendasRequest as Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = [];

        try {
            $api = new Client();
            $url = env('API_URL') . "/api/v1/venda/lista";
            $request = $api->get($url);

            if ($request->getStatusCode() == 200) {
                $vendas = json_decode($request->getBody(), true);
            }
        }
        catch (\Exception $e) {
            return redirect('/vendas')->with('error', 'Houve um problema ao buscar as vendas! Error: ' . $e->getMessage());
        }

        return view('vendas.index', ['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = [];

        try {
            $api = new Client();
            $url = env('API_URL') . "/api/v1/vendedor/lista";
            $request = $api->get($url);

            if ($request->getStatusCode() == 200) {
                $users = json_decode($request->getBody(), true);
            }
        }
        catch (\Exception $e) {
            return redirect('/vendas')->with('error', 'Houve um problema ao buscar os vendedores! Error: ' . $e->getMessage());
        }

        return view('vendas.create', ['vendedores' => $users['data']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VendasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->validated();

        try {
            $api = new Client();
            $url = env('API_URL') . "/api/v1/venda/incluir";
            $request = $api->post($url, [RequestOptions::JSON => $post]);

            if ($request->getStatusCode() == 200){
                return redirect('/vendas')->with('success', 'Venda realizada com sucesso!');
            }

            if ($request->getStatusCode() == 500){
                $data = json_decode($request->getBody(), true);
                return redirect('/vendas')->with('error', 'Houve um problema realizar uma venda! Error: ' . $data['message']);
            }
        }
        catch (\Exception $e){
            return redirect('/vendas')->with('error', 'Houve um problema realizar uma venda! Error: ' . $e->getMessage());
        }

        return redirect('/vendas');
    }
}
