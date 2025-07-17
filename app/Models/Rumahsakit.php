<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumahsakit extends Model
{
    protected $table = 'rumahsakits';
    protected $primaryKey = 'no';
    public $incrementing = true;
    protected $fillable = [
        'nama', 'alamat', 'no_telepon', 'type', 'latitude', 'longitude'
    ];
}
