<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class VerificationController extends Controller{
    public function verified($id) {
        if (auth()->user()->role == 'admin') {
            $user = User::find($id);
            return $user;
            $user->update([
                'verified' => false
            ]);
            return response()->json([
                'message' => 'User has been verified',
                'status' => 'success',
            ], 200);
        } else {
            return response()->json([
                'message' => 'You are not authorized to access this page',
                'status' => 'error',
            ], 401);
        }
    }

    public function verification() {
        if (auth()->user()->role == 'admin') {
            $pedagang = User::where('role', 'pedagang')->orderBy('verified', 'asc')->orderBy('created_at', 'desc')->get();
            return $pedagang;
        } else {
            return response()->json([
                'message' => 'You are not authorized to access this page',
                'status' => 'error',
            ], 401);
        }
    }
}