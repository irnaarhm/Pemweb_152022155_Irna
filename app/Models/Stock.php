<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';

    protected $fillable = [
        'flower_id', 'quantity'
    ];

    public function flower()
    {
        return $this->belongsTo(Flower::class, 'flower_id');
    }
}
