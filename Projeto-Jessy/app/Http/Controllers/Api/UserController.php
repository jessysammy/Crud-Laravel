<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

     /**
     * Retorna uma lista paginada de usuarios.
     * e a retorna como uma resposta JSON
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() :JsonResponse
    {
        //Recupera os usuarios do banco de dados ,ordenados pelo id em ordem decrescente, paginados
        $users = User::orderBy('id', 'DESC')->paginate(2);


     // Retornamos os usuarios reuperados como uma resposta JSON
        return response()->json([
         'status' => true,
         'users' => $users,
        ], 200);
    }
    
    public function show(User $user) :JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => $user,
           ], 200); 
    }

    public function store(UserRequest $request) :JasonResponse
    { 
        DB::beginTransaction();
        try{
           $user = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'password' =>$request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' =>$user,
                'message' => "Usuario cadastrado com sucesso!",
               ], 201);

        }catch (Exception $e){

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuario Não cadastrado!",
               ], 400);

        }
    }
     
    public function update(UserRequest $request, User $user) :JasonResponse
    {

        DB::beginTransaction();

        try{

            $user->update([
                'name' => $request->name,
                'email' =>$request->email,
                'password' =>$request->password,


            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' =>$user,
                'message' => "Usuario editado com sucesso!",
               ], 200);

        }catch (Exception $e){

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuario Não Editado!",
               ], 400);

        }

        
    }

    public function destroy(User $user) : JsonResponse
    {
        try{
            $user->delete();

            return response()->json([
                'status' => true,
                'user' =>$user,
                'message' => "Usuario apagado com sucesso!",
               ], 200);

        }catch(Exception $e){
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuario Não Apagado!",
               ], 400);
        }
    }
}
