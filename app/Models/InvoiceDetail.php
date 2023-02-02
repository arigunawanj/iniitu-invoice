<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
