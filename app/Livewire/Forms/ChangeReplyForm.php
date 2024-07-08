<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Comment;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class ChangeReplyForm extends Form
{

    #[Rule('required')]
    public string $comment = '';

    public function store($edit_comment_id) {
       $this->validate();

        $comment = Comment::where('id', $edit_comment_id)->update([
            'comment' => $this->comment,
        ]);

        $this->reset();
        return $comment;
    }
}
