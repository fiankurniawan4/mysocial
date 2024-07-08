<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Comment;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class CommentForm extends Form
{
    #[Rule('required')]
    public string $comment = '';

    public function store($articlesId)
    {

        $this->validate();

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'comment' => $this->comment,
            'article_id' => $articlesId
        ]);

        $this->reset();

        return $comment;
    }
}
