<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class UserController extends Controller{
    public function index()
    {
        // count all users with specified role 
        if (auth()->user()->role == 'admin') {
            $customer = User::where('role', 'customer')->count();
            $pedagang = User::where('role', 'pedagang')->count();
            $new_pedagang = User::where('role', 'pedagang')->where('verified', true)->orderBy('created_at', 'desc')->limit(4)->get();
            // save count from every role in array with key and value 
            $data = [
                'total_customer' => $customer,
                'total_pedagang' => $pedagang,
                'new_pedagang' => $new_pedagang
            ];
    
            return $data;

        } else {
            return response()->json([
                'message' => 'You are not authorized to access this page',
                'status' => 'error',
            ], 401);
        }
    }
    public function gambar(Request $request) {
        return $request->all();
    }

    
}