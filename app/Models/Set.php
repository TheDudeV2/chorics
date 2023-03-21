<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Set extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class)
            ->withPivot('order')
            ->orderByPivot('order');
    }

    public function getOwnerName()
    {
        return $this->user->name;
    }
}
