<?php

namespace App\Livewire;

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

    #[\Livewire\Attributes\On('postAdded')]
    public function updateList($articles) {
    }

    public function save() {
        $this->validate();

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
