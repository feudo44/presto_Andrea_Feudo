<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticleForm extends Component
{
    public $title;
    public $description;
    public $price;
    public $category;

    protected function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'title.required' => __('ui.title_required'),
            'title.min' => __('ui.title_min'),
            'description.required' => __('ui.description_required'),
            'description.min' => __('ui.description_min'),
            'price.required' => __('ui.price_required'),
            'price.numeric' => __('ui.price_numeric'),
            'category.required' => __('ui.category_required'),
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

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

        session()->flash('success', __('ui.article_created'));
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