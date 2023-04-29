<?php

namespace App\Models\Editor;

use App\Models\Editor\Block\Paragraph;
use App\Models\Editor\Block\Lyric;
use App\Models\Editor\Block\ChordLine;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Data extends Model
{
    use HasFactory;

    public string $time;
    public string $version;

    protected $fillable = [
        'time',
        'version',
    ];

    public function song(): BelongsTo
    {
        return $this->belongsTo(Song::class);
    }

    public function paragraphs(): HasMany
    {
        return $this->hasMany(Paragraph::class);
    }

    public function lyrics(): HasMany
    {
        return $this->hasMany(Lyric::class);
    }

    public function chordLines(): HasMany
    {
        return $this->hasMany(ChordLine::class);
    }
}
