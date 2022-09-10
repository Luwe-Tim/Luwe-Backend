<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deskripsi;
use App\Models\User;

class DeskripsiController extends Controller {

    public function index()
    {
        $deskripsi = Deskripsi::all();
        return $deskripsi;
    }

    public function store(Request $request)
    {
        if (auth()->user()->role == 'pedagang') {
            $validate = $this->validate($request, [
                'nama_dagangan' => 'required|string|max:255',
                'kategori_dagangan' => 'required|string',
                'jam_dagang' => 'required|string',
                'deskripsi' => 'required|string'
            ]);
            // return $validate;

            $deskripsi = new Deskripsi;
            $deskripsi->user_id = auth()->user()->id;
            $deskripsi->nama_dagangan = $validate['nama_dagangan'];
            $deskripsi->jenis_dagangan = $validate['kategori_dagangan'];
            $deskripsi->jam_dagang = $validate['jam_dagang'];
            $deskripsi->deskripsi = $validate['deskripsi'];
            $deskripsi->save();

            return response()->json($deskripsi, 201);
        }
    }
}