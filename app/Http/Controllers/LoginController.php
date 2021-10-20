<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTExceptions;


class LoginController extends Controller

{

    public function register(Request $request)
    {


        $var_utenti = User::where('email', $request['email'])->first();

        if ($var_utenti) {
            $response['status'] = 0;
            $response['message'] = "Utente già esistente";
            $response['code'] = 409;
            return response()->json($response);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'codicefiscale' => $request->codicefiscale

            ]);
            $response['status'] = 1;
            $response['message'] = "Utente registrato con successo";
            $response['code'] = 200;

        }
        return response()->json($response);
    }





    public function login(Request $request)
    {
      $dato = $request->only('email', 'password');
      try {
          if(!JWTAuth::attempt($dato)) {
              $response['status'] = 0;
              $response['code'] = 401;
              $response['data'] = null;
              $response ['message'] = 'Password o Email Errata';
              return response()->json($response);

          }

      } catch(JWTExceptions $e) {
          $response['data'] = null;
          $response['code'] = 500;
          $response ['message'] = 'User non trovato';
          return response()->json($response);

      }

      $user = auth()->user();
      $data['token'] = auth()->claims([
          'user_id' => $user->id,
          'email' => $user->email

      ])->attempt($dato);
        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response ['message'] = 'Entrato!';

        return response()->json($response);

    }


    }
