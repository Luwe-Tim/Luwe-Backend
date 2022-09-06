<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;


class UserController extends Controller{
    public function index()
    {
        // count all users with specified role 
        $customer = User::where('role', 'customer')->count();
        $pedagang = User::where('role', 'pedagang')->count();
        // save count from every role in array with key and value 
        $data = [
            'total_customer' => $customer,
            'total_pedagang' => $pedagang
        ];

        $new_pedagang = User::where('role', 'pedagang')->where('created_at',);
        return $data;
    }
}