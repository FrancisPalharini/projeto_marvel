<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    #função para registrar o voto de favorito
    
    public function vote(Request $request)
    {
        $request->validate([
            #definição dos campos obrigatorios
            
            'id_prod'=>'required',
            'name_employee'=>'required',
            'team'=>'required',
            'age'=>'required',
            'genre'=> 'required',
            'vote'=>'required',
        ]);

        $votacion= Vote::create([
            
            'id_prod'=>$request->id_prod,
            'name_employee'=>$request->id_prod,
            'team'=>$request->team,
            'age'=>$request->age,
            'genre'=> $request->genre,
            'vote'=>$request->vote,
        ]);
        #messagem de finalização positiva ou negativa ??????
        return response()->json([
            "message" => "vote recorded, thank you!"
        ], 201);
    }
    #function para visulizar os dados brutos da votação
    public function index()
    {

        return Vote::all();
    }
}
