<?php

namespace App\Livewire\Articles;

use App\Livewire\Forms\CommentForm;
use App\Models\Article;
use App\Models\Comment;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

    public CommentForm $form;
    public Article $articles;

    public function save(): void
    {
        $this->form->store($this->articles->id);
    }

    public function render()
    {
        return view('livewire.articles.create');
    }
}
