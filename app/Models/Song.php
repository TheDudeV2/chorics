<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'lyrics',
        'key_id',
    ];

    /**
     * Get the user that owns the song.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function key(): BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    public function sets(): BelongsToMany
    {
        return $this->belongsToMany(Set::class);
    }

    public function getOwnerName()
    {
        return $this->user->name;
    }

    public function transposeUp()
    {
        if($this->key->id < Key::count()) {
            $this->key_id = $this->key->id + 1;
        }
        else
        {
            $this->key_id = 1;
        }

        $this->save();
        $this->refresh();
        return $this->key->getString();
    }

    public function transposeDown()
    {
        if($this->key->id > 1) {
            $this->key_id = $this->key->id - 1;
        }
        else
        {
            $this->key_id = Key::count();
        }

        $this->save();
        $this->refresh();
        return $this->key->getString();
    }
}
