<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deskripsi;
use App\Models\User;

class DeskripsiController extends Controller {

    public function store(Request $request)
    {
        if (auth()->user()->role == 'pedagang') {
            $validate = $this->validate($request, [
                'nama_dagangan' => 'required|string|max:255',
                'jenis_dagangan' => 'required|string',
                'deskripsi' => 'required|string'
            ]);
            // return $validate;

            $deskripsi = new Deskripsi;
            $deskripsi->user_id = auth()->user()->id;
            $deskripsi->nama_dagangan = $validate['nama_dagangan'];
            $deskripsi->jenis_dagangan = $validate['jenis_dagangan'];
            $deskripsi->deskripsi = $validate['deskripsi'];
            $deskripsi->save();

            return response()->json($deskripsi, 201);
        }
    }
}