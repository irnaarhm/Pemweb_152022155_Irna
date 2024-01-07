<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;
    protected $table = 'flower';

    protected $fillable = [
        'name', 'description', 'price', 'image'
    ];

    public function stock()
    {
        return $this->hasMany(Stock::class, 'flower_id');
    }
}
