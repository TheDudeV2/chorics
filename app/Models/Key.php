<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public $timestamps = false;

    public function getMajorKeyString(): string
    {
        return $this->tonic;
    }

    public function getMinorKeyString(): string
    {
        return $this->relative_minor.'m';
    }

    public function getString(): string
    {
        return $this->getMajorKeyString().' / '.$this->getMinorKeyString();
    }
}
