<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hutang extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'transaction_date',
        'transaction_number',
        'paket_id',
        'qty',
        'discount',
        'total_price',
        'bayar',
        'due_date_payment',
    ];
}
