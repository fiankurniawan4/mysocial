<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Articles')]
class Index extends Component
{

    #[\Livewire\Attributes\On('commentAdded')]
    public function updateList($articles) {
    }

    public $slug;

    public function mount($slug)
    {
        $this->slug = Article::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.articles.index', [
            'articles' => $this->slug
        ]);
    }
}
