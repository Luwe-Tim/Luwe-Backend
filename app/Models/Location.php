<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model{
    protected $table = "locations";

    // protected $fillable = [];
    protected $fillable = ['user_id', 'lat', 'long'];

    // public $timestamps = false;
    public function user() {
        $this->belongsTo(User::class);
    }
}