<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    public $timestamps = false;

    public function getMajorKey(): string
    {
        return $this->tonic;
    }

    public function getMinorKey(): string
    {
        return $this->relative_minor.'m';
    }

    public function getKey(): string
    {
        return $this->getMajorKey().' / '.$this->getMinorKey();
    }
}
