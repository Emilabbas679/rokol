<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColorGroups extends Model
{

    public $table = 'product_color_groups';

    public $timestamps = false;

    public $fillable = [
        'product_id',
        'color_group_id'
    ];

    public function colorGroup(): BelongsTo
    {
        return $this->belongsTo( ColorGroup::class );
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo( Product::class );
    }

}
