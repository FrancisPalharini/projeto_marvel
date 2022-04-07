<?php

use App\Http\Controllers\{
    ProductionController,
    AuthController,
    VoteController,
    QueryController

};

use Illuminate\Support\Facades\Route;


#rotas sem atenticação (visualização)
Route::get('/productions', [ProductionController::class, 'index']);
Route::get('/productions/{id}', [ProductionController::class, 'show'])->name('productions_id.show');
Route::get('/productions/search/{name}', [ProductionController::class, 'search'])->name('productions_name.search');

#rotas de usuario sem autenticação (registro, login)
Route::post('/register',[AuthController::class,'register'])->name('register.create');
Route::post('/login',[AuthController::class,'login'])->name('register.login');

#rotas sem autenticação para votação
Route::post('/votes',[VoteController::class, 'vote'])-> name('vote.create');
Route::get('/votes',[VoteController::class, 'index'])-> name('vote.index');

#rotas sem autenticação dos filtros
Route::get('/filters', [QueryController::class, 'favorite_production'])->name('filters.favorite_production');
Route::get('/filters/{type}', [QueryController::class, 'favorite_byType'])->name('filters.favorite_byType');
Route::get('/filters/ranking/top10', [QueryController::class, 'top10'])->name('filters.top10');
Route::get('/filters/ranking/by/genre/{genre}', [QueryController::class, 'ranking_byGenre'])->name('filters.ranking_byGenre');
Route::get('/filters/ranking/by/team/{team}', [QueryController::class, 'ranking_byTeam'])->name('filters.ranking_byTeam');
Route::get('/filters/ranking/by/age25', [QueryController::class, 'ranking_byAge25'])->name('filters.ranking_byAge25');
Route::get('/filters/ranking/by/age', [QueryController::class, 'ranking_byAge'])->name('filters.ranking_byAge');
Route::get('/filters/favorite/{name}', [QueryController::class, 'favorite'])->name('filters.favorite');

#rotas protegidas com autenticação - acesso adm
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::post('/productions', [ProductionController::class, 'store'])->name('productions.store');
    Route::put('/productions/{id}', [ProductionController::class, 'update'])->name('productions_id.update');
    Route::delete('/productions/{id}', [ProductionController::class, 'destroy'])->name('productions_id.destroy'); 
    Route::post('/logout',[AuthController::class,'logout'])->name('register.logout');
});

