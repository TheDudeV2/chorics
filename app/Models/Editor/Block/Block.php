<?php

namespace App\Models\Editor\Block;

use App\Models\Editor\Data;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Block
{
    public string $id;
    public string $type;

    protected $casts = [
        'data' => 'array',
    ];

    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }

}
