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
    #[\Livewire\Attributes\On('commentAdded')]
    public function updateList($articles) {
    }

    public function save()
    {
        $post = $this->form->store($this->articles->id);
        $this->dispatch('commentAdded', $this->articles);
    }

    public function render()
    {
        return view('livewire.articles.create');
    }
}
