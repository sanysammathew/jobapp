<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of JwtAuthenticateController
 *
 * @author sanym
 */
class JwtAuthenticateController extends Controller
{

    public function index()
    {
        return response()->json(['auth'=>Auth::user(), 'users'=>User::all()]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function createRole(Request $request){
        // Todo       
    }

    public function createPermission(Request $request){
        // Todo       
    }

    public function assignRole(Request $request){
         // Todo
    }

    public function attachPermission(Request $request){
        // Todo       
    }

}
