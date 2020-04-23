<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = [];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('active', 1);
    }

    public function card()
    {
        return $this->hasMany(Card::class)->where('user_id', auth()->user()->id);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function markedNumbers()
    {
        return $this->hasManyThrough(Number::class, Card::class)->where('marked', true);
    }

    public function generateCardForPlayer(User $user): Card
    {
        $card = $this->card()->make();
        $card->user()->associate($user);
        $card->save();
        $card->generateNumbers();
        return $card;
    }
}
