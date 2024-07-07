<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class Listcomment extends Component
{

    public Article $articles;

    public function render()
    {
        return view('livewire.articles.listcomment',
        [
            'comments' => Comment::where('article_id', $this->articles->id)->get()
        ]);
    }
}
