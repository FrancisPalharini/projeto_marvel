<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;


class ProductionController extends Controller
{

    public function index()
    {

        return Production::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            #definição dos campos obrigatorios
            'name' => 'required|unique:productions,name',
            'release_date' => 'required',
            'type' => 'required|string',
            'director' => 'required|string'
        ]);


        return Production::create($request->all());


        #messagem de finalização positiva ou negativa ??????


    }


    public function show($id)
    {
        if(!$id){
            return Production::findOrFail($id);
        #melhor usar find or fail em questões de segurança para fechar a rota após o erro

        } else {
            return ('production not found '&& 404);
        };
 
    }


    public function update(Request $request, $id)
    {
        #update production, searching by id
        $product = Production::findOrFail($id);
        $product->update($request->all());
        return response()->json([
            "message" => "production record updated"
        ], 201);
    }


    public function destroy($id)
    {
        #delete production by id
        return response()->json([
            "message" => "production delete"
        ], 201);
    }

    public function search($name)
    {
        #pesquisa por nomes
        return Production::where('name', 'like', '%' . $name . '%')->get();
        response()->json([
            "message" => "production delete"
        ], 201);
    }
}
