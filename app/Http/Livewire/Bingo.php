<?php

namespace App\Http\Livewire;

use App\Game;
use App\Number;
use Livewire\Component;

class Bingo extends Component
{
    public function mount()
    {

    }

    public function markNumber(int $numberId)
    {
        Number::find($numberId)->toggle();
    }

    public function render()
    {
        $game = Game::active()->with('card.numbers')->first();

        if($game instanceOf Game && $game->card->first() === null){
            $game->generateCardForPlayer(auth()->user());
            $game->fresh();
        }

        return view('livewire.bingo', [
            'game' => $game,
        ]);
    }
}
