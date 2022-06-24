<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'manufacturer_id',
        'category_id',
        'flavor_id',
        'quantity',
        'location_id',
        'image'

    ];

    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'id', 'manufacturer_id');
    }

    public function flavor()
    {
        return $this->hasOne(Flavor::class, 'id', 'flavor_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function location()
    {
        return $this->hasOne(ProductLocation::class, 'id', 'location_id');
    }
}
