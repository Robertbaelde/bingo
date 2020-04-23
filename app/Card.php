<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function numbers(): HasMany
    {
        return $this->hasMany(Number::class)->orderBy('order');
    }

    public function generateNumbers(): void
    {
        $numberPool = collect(range(1, 75))->shuffle();

        $numbers = collect(range(1, 25))->map(function($i) use (&$numberPool) {
            return ['number' => $numberPool->pop(), 'order' => $i];
        });

        $this->numbers()->createMany($numbers->toArray());
    }
}
