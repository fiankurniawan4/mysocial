<?php

namespace App\Livewire\Articles;

use App\Livewire\Forms\ChangeReplyForm;
use App\Livewire\Forms\CommentForm;
use App\Livewire\Forms\ReplyForm;
use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class Listcomment extends Component
{
    #[\Livewire\Attributes\On('commentAdded')]
    public function updateList($articles) {
    }

    public Article $articles;
    public ReplyForm $mreply;
    public ChangeReplyForm $mchange;
    public $body2, $comment_id, $edit_comment_id;

    public function selectReply($id) {
        $this->comment_id = $id;
        $this->edit_comment_id = '';
        $this->body2 = '';
    }

    public function reply() {
        $reply = $this->mreply->store($this->articles->id, $this->comment_id);

        if($reply) {
            $this->dispatch('commentAdded', $this->articles);
            $this->body2 = '';
            $this->comment_id = '';
        } else {
            // flash('Komentar tidak ditambahkan', 'danger');
            $this->body2 = '';
        }
    }

    public function selectEdit($id) {
        $comment = Comment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->mchange->comment = $comment->comment;
        // dd($this->mreply->comment);
        $this->comment_id = '';
    }

    public function change() {
        $comment = $this->mchange->store($this->edit_comment_id);

        if($comment) {
            $this->dispatch('commentAdded', $this->articles);
            $this->mchange->comment = '';
            $this->edit_comment_id = '';
        } else {
            // flash('Komentar tidak ditambahkan', 'danger');
            $this->mreply->comment = '';
        }
    }

    public function delete($id) {
        $comment = Comment::find($id)->delete();
        if($comment) {
            return;
        } else {
            // flash('Komentar tidak dihapus', 'danger');
            return redirect()->back();
        }
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
        return view('livewire.articles.listcomment',
        [
            'comments' => Comment::with(['user','childrens'])
            ->where('article_id', $this->articles->id)
            ->whereNull('comment_id')->get(),
            'total_comments' => Comment::where('article_id', $this->articles->id)->count()
        ]);
    }
}
