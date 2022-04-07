<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
    public function register(Request $request)
    {
    
        $request->validate([
            #definição dos campos obrigatorios
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user ->createToken('primeirotoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
     
            return response($response, 201);
    }


    public function login (Request $request)
    {
        
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        #validação do email, se há no banco
        $user= User::where('email', $request->email)->first();

        #validação do user e senha
        if (!$user || Hash::check($request->passaword, $user->password)) {
            return response([
                'message' => 'credentials incorrets'
            ], 401);
        }

        $token = $user->createToken('primeirotoken')->plainTextToken;

        $reponse =[
            'message'=>'login done',
            'token'=> $token
        ];

        return response($reponse, 201);

    }

    public function logout (){
        auth()->user()->tokens()->delete();
        return [
            'message'=> 'logout complete and all tokens deleted'
        ];
    }

}
