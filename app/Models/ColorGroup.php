<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorGroup extends Model
{
    protected $table = 'color_groups';

    protected $fillable = [ 'name', 'display' ];

    protected $casts = [
        'name' => 'array'
    ];

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany( Color::class, 'color_group_pivot', 'color_id', 'color_group_id' );
    }

}
