<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendedoresRequest as Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendedores = [];

        try {
            $api = new Client();
            $url = env('API_URL') . "/api/v1/vendedor/lista";
            $request = $api->get($url);

            if ($request->getStatusCode() == 200) {
                $vendedores = json_decode($request->getBody(), true);
            }
        }
        catch (\Exception $e) {
            return redirect('/vendedores')->with('error', 'Houve um problema ao buscar os vendedores! Error: ' . $e->getMessage());
        }

        return view('vendedores.index', ['vendedores' => $vendedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\VendedoresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->validated();

        try {
            $api = new Client();
            $url = env('API_URL') . "/api/v1/vendedor/incluir";
            $request = $api->post($url, [RequestOptions::JSON => $post]);

            if ($request->getStatusCode() == 200){
                return redirect('/vendedores')->with('success', 'Vendedor cadastrado com sucesso!');
            }
        }
        catch (\Exception $e){
            return redirect('/vendedores')->with('error', 'Houve um problema ao cadastrar o vendedor! Error: ' . $e->getMessage());
        }

        return redirect('/vendedores');
    }
}
