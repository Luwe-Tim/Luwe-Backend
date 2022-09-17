<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller{

    public function store(Request $request) {
        if (auth()->user()->role == 'pedagang' && auth()->user()->verified == true) {
            $location = Location::where('user_id', auth()->user()->id)->first();
            if ($location) {
                $location->update([
                    'lat' => $request->lat,
                    'long' => $request->long
                ]);
                return 'success';
            } else {
                Location::create([
                    'user_id' => auth()->user()->id,
                    'lat' => $request->lat,
                    'long' => $request->long
                ]);
                return 'success';
            }
        } else {
            return 'failed';
        }
    }
}