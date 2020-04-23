<?php

namespace App\Http\Livewire;

use App\Card;
use App\Game;
use Livewire\Component;

class GameMaster extends Component
{
    public $selectedCard;

    public function stopGame()
    {
        Game::active()->update(['active' => 0]);
    }

    public function startNewGame()
    {
        if(Game::active()->count() > 0){
            return;
        }

        Game::create([
            'active' => 1
        ]);
    }

    public function selectCard(int $cardId)
    {
        $this->selectedCard = Card::with('numbers')->findOrFail($cardId);
    }

    public function closeCard()
    {
        $this->selectedCard = null;
    }

    public function render()
    {
        $game = Game::active()
            ->withCount('card')
            ->withCount('markedNumbers')
            ->with('cards.user')
            ->first();

        return view('livewire.game-master', [
            'game' => $game
        ]);
    }
}
