<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class Home extends Component
{
    #[\Livewire\Attributes\On('commentAdded')]
    public function updateList($articles) {
    }

    public function render()
    {
        return view('livewire.home', [
            'articles' => Article::all(),
        ]);
    }
}
