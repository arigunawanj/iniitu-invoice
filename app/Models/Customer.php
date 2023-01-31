<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
    
    public function faktur()
    {
        return $this->hasMany(Faktur::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);    
    }
}
