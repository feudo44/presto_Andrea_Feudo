<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $images = [];
    public $temporary_images;

    protected function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'category' => 'required',
            'images.*' => 'image|max:1024',
            'temporary_images.*' => 'image|max:1024',
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
            'images.*.image' => __('ui.image_invalid'),
            'images.*.max' => __('ui.image_max'),
            'temporary_images.*.image' => __('ui.image_invalid'),
            'temporary_images.*.max' => __('ui.image_max'),
        ];
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'temporary_images') || str_starts_with($property, 'images')) {
            return;
        }

        $this->validateOnly($property);
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:1024',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }

        $this->temporary_images = null;
    }

    public function removeImage($key)
    {
        if (array_key_exists($key, $this->images)) {
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }

    public function store()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id(),
        ]);

        foreach ($this->images as $image) {
            $article->images()->create([
                'path' => $image->store('articles/' . $article->id, 'public'),
            ]);
        }

        session()->flash('success', __('ui.article_created'));
        $this->cleanForm();
    }

    protected function cleanForm()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = null;
    }

    public function render()
    {
        return view('livewire.create-article-form', [
            'categories' => Category::all(),
        ]);
    }
}