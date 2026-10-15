<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
    #[Validate('required|min:5', message: [
        'required' => 'Il titolo è obbligatorio',
        'min' => 'Il titolo deve avere almeno 5 caratteri',
    ])]
    public $title;

    #[Validate('required|min:10', message: [
        'required' => 'La descrizione è obbligatoria',
        'min' => 'La descrizione deve avere almeno 10 caratteri',
    ])]
    public $description;

    #[Validate('required|numeric', message: [
        'required' => 'Il prezzo è obbligatorio',
        'numeric' => 'Il prezzo deve essere un numero',
    ])]
    public $price;

    #[Validate('required', message: ['required' => 'Seleziona una categoria'])]
    public $category;

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Articolo creato correttamente');
        $this->cleanForm();
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        return view('livewire.create-article-form', [
            'categories' => Category::all(),
        ]);
    }
}