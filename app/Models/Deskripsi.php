<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model{
    protected $table = "deskripsi";

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    // protected $fillable = [];

    // public $timestamps = false;
}