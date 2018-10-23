<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = ['id'];

    public function notable()
    {
        return $this->morphTo();
    }
}