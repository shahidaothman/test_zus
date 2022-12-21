<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string',
            // 'c_password' => 'required|same:password'
        ]);

        $user = new User([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('user');
        return $user;

        if ($user->save()) {

            return $this->login($request);
        }

        // if ($user->save()) {
        //     $tokenResult = $user->createToken('Personal Access Token');
        //     $token = $tokenResult->plainTextToken;

        //     return response()->json([
        //         'message' => 'Successfully created user!',
        //         'accessToken' => $token,
        //     ], 201);
        // } else {
        //     return response()->json(['error' => 'Provide proper details']);
        // }

       
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email',
        //     'password' => 'required|string',
        //     // 'remember_me' => 'boolean'
        // ]);

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = request(['email', 'password']);
        // if (!Auth::attempt($credentials)) {
            if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'Email or Password invalid'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        // $token = $tokenResult->plainTextToken;
        $token = $tokenResult->plainTextToken;


        return $this->respondWithToken($token);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    // public function me()
    // {
    //     return response()->json(auth()->user());
    // }

    protected function respondWithToken($token)
    {

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
           
        ]);
    }
}
