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

    public function store($articlesId): void
    {
        $user = \App\Models\User::find(1);

        $this->validate();

        Comment::create([
            'user_id' => $user->id,
            'comment' => $this->comment,
            'article_id' => $articlesId
        ]);

        $this->reset();
    }
}
