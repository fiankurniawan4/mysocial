<?php

namespace App\Livewire\Articles;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Articles')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.articles.index');
    }
}
