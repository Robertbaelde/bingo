<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $guarded = [];

    public function use()
    {
        if($this->used !== 0){
            abort(422, 'invite already used');
        }
        $this->used = 1;
        $this->save();
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
