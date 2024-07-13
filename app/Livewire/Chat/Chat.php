<?php

namespace App\Livewire\Chat;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.chat')]
class Chat extends Component
{
    public function render()
    {
        return view('livewire.chat.chat');
    }
}
