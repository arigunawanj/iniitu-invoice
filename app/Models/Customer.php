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

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function invoiced()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);    
    }
}
