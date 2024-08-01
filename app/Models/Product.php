<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Type;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
        'about' => 'array',
        'usage' => 'array',
        'advantage' => 'array',
        'properties' => 'array',
        'consumption' => 'array',
        'retention' => 'array',
        'warning' => 'array',
        'guarantee' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'product_types', 'product_id', 'type_id');
    }

}
