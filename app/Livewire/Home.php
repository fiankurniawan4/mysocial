<?php

namespace App\Livewire;

use App\Livewire\Forms\EditForm;
use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

#[Title('Home')]
class Home extends Component
{

    #[Rule('required')]
    public $title, $content;
    public EditForm $edit;
    public $articlesEdit;

    #[\Livewire\Attributes\On('postAdded')]
    public function updateList($articles) {
    }

    public function selectEdit($id) {
        if (auth()->id() != Article::find($id)->user_id) {
            return;
        }

        $this->articlesEdit = '';
        $this->edit->title2 = '';
        $this->edit->content2 = '';

        $articles = Article::find($id);
        $this->articlesEdit = $articles;
        $this->edit->edit = $articles;
        $this->edit->title2 = $articles->title;
        $this->edit->content2 = $articles->body;
        // dd($this->edit);
    }

    public function editForm() {
        $form = $this->edit->store();
        // dd($this->articlesEdit);
        $this->dispatch('postAdded', $this->articlesEdit);
    }

    public function delete($id) {
        if (auth()->id() != Article::find($id)->user_id) {
            return;
        }
        Article::destroy($id);
    }

    public function save() {
        $this->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:8',
        ]);

        $slug = Str::slug($this->title);
        if (Article::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }

        $myPost = Article::create([
            'title' => $this->title,
            'body' => $this->content,
            'description' => substr($this->content, 0, 100),
            'slug' => $slug,
            'user_id' => auth()->id(),
        ]);

        $this->title = '';
        $this->content = '';

        $this->reset();
        $this->dispatch('postAdded', $myPost);
    }

    public function render()
    {
        return view('livewire.home', [
            'articles' => Article::all(),
        ]);
    }
}
