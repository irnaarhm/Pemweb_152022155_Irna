<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'customer_id', 'flower_id', 'transaction_date', 'quantity', 'status', 'admin_id', 'total_amount'
    ];
}
