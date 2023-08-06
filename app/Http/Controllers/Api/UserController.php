<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostLoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostRegisterRequest;


class UserController extends Controller
{
    
    public function register(PostRegisterRequest $request)
    {
        $user = new User();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json([
            "msg" => "Registro de usuario exitoso!"
        ],200);
    }
   
    public function login(PostLoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    "msg" => "Usuario Logueado exitosamente",
                    "access_token" => $token,
                ]);

            }else{
                return response()->json([
                    "error" => "La password es incorrecta"
                ]);
            }
        }else{
            return response()->json([
                "error" => "Usuario no registrado"
            ],404);
        }
    }

   
    public function userProfile()
    {
        return response()->json([
            "data" => auth()->user(),
        ]);
    }

  
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            "msg" => "Cerrando sesión",
        ]);
    }



    public function destroy(User $user)
    {
        //
    }
}
