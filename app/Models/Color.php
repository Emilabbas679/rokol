<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Kalnoy\Nestedset\NodeTrait;

class Color extends Model
{
    use NodeTrait;
    protected $guarded = [];

    protected $casts = [
        'name' => 'array',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany( Product::class );
    }


}
