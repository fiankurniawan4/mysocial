<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditForm extends Form
{
    #[Rule('required')]
    public $title, $content;
    public $edit;

    public function store() {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $articles = Article::where('id', $this->edit->id)->update([
            'title' => $this->title,
            'body' => $this->content,
            'description' => substr($this->content, 0, 100),
        ]);

        $this->reset();

        return $articles;
    }
}
