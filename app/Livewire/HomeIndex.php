<?php

namespace App\Livewire;

use App\Livewire\Forms\EditForm;
use App\Models\Article;
use Livewire\Component;

class HomeIndex extends Component
{

    public $articles;
    public EditForm $edit;
    public $articlesEdit;

    #[\Livewire\Attributes\On('postAdded')]
    public function updateList($articles)
    {
        $this->articles = Article::latest()->get();
    }

    public function delete($id)
    {
        if (auth()->id() != Article::find($id)->user_id) {
            return;
        }
        Article::destroy($id);
        $this->dispatch('postAdded', $this->articles);
    }

    public function selectEdit($id)
    {
        if (auth()->id() != Article::find($id)->user_id) {
            return;
        }

        $this->articlesEdit = '';
        $this->edit->title = '';
        $this->edit->content = '';

        $articles = Article::find($id);
        $this->articlesEdit = $articles;
        $this->edit->edit = $articles;
        $this->edit->title = $articles->title;
        $this->edit->content = $articles->body;
    }

    public function editForm()
    {
        $this->edit->store();
        // dd($this->articlesEdit);
        $this->dispatch('postAdded', $this->articlesEdit);
    }

    public function render()
    {
        return view('livewire.home-index');
    }
}
