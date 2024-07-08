<?php

namespace App\Livewire\Articles;

use App\Livewire\Forms\ChangeReplyForm;
use App\Livewire\Forms\CommentForm;
use App\Livewire\Forms\ReplyForm;
use App\Models\Article;
use App\Models\Comment;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

    public CommentForm $form;
    public ReplyForm $mreply;
    public ChangeReplyForm $mchange;
    public Article $articles;
    public $body2, $comment_id, $edit_comment_id;

    #[\Livewire\Attributes\On('commentAdded')]
    public function updateList($articles) {
    }

    public function save()
    {
        $this->form->store($this->articles->id);
        $this->dispatch('commentAdded', $this->articles);
    }

    // public function like($id) {
    //     $data = [
    //         'comment_id' => $id,
    //         'user_id' => auth()->id()
    //     ];

    //     $like = Like::where($data);
    //     if ($like->count() > 0) {
    //         $like->delete();
    //     } else {
    //         Like::create($data);
    //     }
    //     return;
    // }

    public function render()
    {
        return view('livewire.articles.create');
    }
}
