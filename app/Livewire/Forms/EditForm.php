<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditForm extends Form
{
    #[Rule('required')]
    public $title2, $content2;
    public $edit;

    public function store() {
        $this->validate([
            'title2' => 'required',
            'content2' => 'required',
        ]);

        $articles = Article::where('id', $this->edit->id)->update([
            'title' => $this->title2,
            'body' => $this->content2,
            'description' => substr($this->content2, 0, 100),
        ]);

        $this->title2 = '';
        $this->content2 = '';

        $this->reset();

        return $articles;
    }
}
