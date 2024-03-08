<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param none
    * @return
    *
    */
    public function __construct()
    {
        $this->middleware(
            'auth:api', ['except' => ['login']]
        );
    }
   /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param email
    * @param password
    * @return JsonResponse
    *
    */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED );
        }
        return $this->respondWithToken($token);
    }
    /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param 
    * @return JsonResponse
    *
    */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param 
    * @return JsonResponse
    *
    */
    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    
   /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param  
    * @return JsonResponse
    *
    */
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }
    
     /*
    *
    * @brief
    * @author Alberto Vazquez
    * @param  string $token
    * @return JsonResponse
    *
    */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
