<?php

namespace App\Livewire\Forms;

use App\Models\Comment;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReplyForm extends Form
{
    #[Rule('required')]
    public string $comment = '';

    public function store($article_id, $comment_id) {
        $this->validate();

        $comment = Comment::find($comment_id);

        $comment = Comment::create([
            'comment' => $this->comment,
            'article_id' => $article_id,
            'user_id' => 1,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        $this->reset();


        // if($comment) {
        //     // $this->dispatch('commentAdded', $comment->id);
        //     $this->body2 = '';
        //     $comment_id = '';
        // } else {
        //     flash('Komentar tidak ditambahkan', 'danger');
        //     $this->body2 = '';
        // }
        return $comment;
    }
}
