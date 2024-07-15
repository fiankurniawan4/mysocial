<?php

namespace App\Livewire;

use App\Livewire\Forms\EditForm;
use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home')]
class Home extends Component
{

    #[Rule('required')]
    public $title, $content;

    public function save()
    {
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

    #[\Livewire\Attributes\On('postAdded')]
    public function updateList($articles)
    {
    }

    public function render()
    {
        return view('livewire.home', [
            'articles' => Article::latest()->get(),
        ]);
    }
}
