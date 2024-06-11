<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'link',
        'transaction_date',
        'transaction_number',
        'paket_id',
        'qty',
        'discount',
        'total_price',
        'bayar',
        'kembalian',
    ];

    public function paket(){

        $this->belongsTo(Paket::class);
        
    }
}
