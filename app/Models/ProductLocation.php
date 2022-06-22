<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'loacation_id', 'id');
    }

}
