<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $guarded = [];

    public function toggle(): void
    {
        $this->marked = !(bool) $this->marked;
        $this->save();
    }
}
