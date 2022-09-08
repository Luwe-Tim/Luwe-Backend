<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;

use App\Models\User;

class AuthController extends Controller{

    public function register(Request $request) {
        $validate = $this->validate($request, [
            'username' => 'required|string|max:255',
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string'
        ]);

        $user = new User;
        $user->username =  $validate['username'];
        $user->phone =  $validate['phone'];
        $user->password =  Hash::make($validate['password']);
        $user->role =  $validate['role'];
        $user->save();

        return response()->json($user, 201);
    }

    public function login(Request $request) {
        $validate = $this->validate($request, [
            'phone' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $user = User::where('phone', $validate['phone'])->first();

        if(!$user || !Hash::check($validate['password'], $user->password)) {
            return response()->json([
                'message' => 'phone or password is incorrect'
            ], 401);
        }

        $payload = [
            'username' => $user->username,
            'phone' => $user->phone,
            'exp' => time() + 60 * 60 * 24,
            'uid' => $user->id,
            'iat' => time(),
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');
        return response()->json([
            'access_token' => $token,
            'user' => $user
        ], 200);
    }
}