<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class QueryController extends Controller
{
    public function index()
    {

        return Query::all();
        
    }
    
    #query para selecionar a produção mais votada
    public function favorite_production()
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(1)
            ->get();

        $reponse =[
            'message'=> 'favorite production',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    #query para selecionar a produção mais votada por tipo(movie ou serie)
    public function favorite_byType($type)
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->where('type', 'like', '%' . $type . '%')
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(1)
            ->get();

        $reponse =[
            'message'=> 'favorite production by type',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    #query para selecionar o top 10 mais votados
    public function top10()
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(10)
            ->get();

        $reponse =[
            'message'=> 'Top 10',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }
    
    #query para selecionar o Ranking por genero (f/m)
    public function ranking_byGenre($genre)
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->where('genre', 'like', '%' . $genre . '%')
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->get();

        $reponse =[
            'message'=> 'Ranking by genre',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    #query para selecionar o Ranking por time (team)
    public function ranking_byTeam($team)
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->where('team', 'like', '%' . $team . '%')
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(10)
            ->get();

        $reponse =[
            'message'=> 'Ranking by team',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    #query para selecionar o Ranking por idade até 25 anos
    public function ranking_byAge25()
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->where('age', '<', 26)
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(10)
            ->get();

        $reponse =[
            'message'=> 'Ranking Age: untill 25 years old',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    #query para selecionar o Ranking por idade maior que 25 anos
    public function ranking_byAge()
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name', DB::raw('SUM(vote) as qtd_votes'))
            ->where('age', '>', 25)
            ->groupBy('name')
            ->orderByDesc('qtd_votes')
            ->limit(10)
            ->get();

        $reponse =[
            'message'=> 'Ranking Age: older than 25 years old',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }

    
    #query para selecionar o favorito por pessoa
    public function favorite($name)
    {
        $query= DB::table('votes')
            ->rightJoin('productions', 'votes.id_prod', '=', 'productions.id')
            ->select('name_employee', 'name')
            ->where('name_employee', 'like', '%' . $name . '%')
            ->get();

        $reponse =[
            'message'=> 'Favorite Production:',
            'query'=> $query
            ];
    
        return response($reponse, 201);
    }
}
