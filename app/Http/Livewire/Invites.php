<?php

namespace App\Http\Livewire;

use App\Invite;
use Illuminate\Support\Str;
use Livewire\Component;

class Invites extends Component
{
    public $code;

    public function randomCode()
    {
        $this->code = Str::random(6);
    }

    public function createInvite()
    {
        $this->code = trim($this->code);
        if(Str::length($this->code) < 1){
            return;
        }
        if(Invite::where('code', $this->code)->count() !== 0){
            $this->code = null;
            return;
        }
        Invite::create(['code' => $this->code]);
        $this->code = null;

    }
    public function render()
    {
        return view('livewire.invites', [
            'invites' => Invite::get()
        ]);
    }
}
