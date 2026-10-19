<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Lang;

class Category extends Model
{
    protected $fillable = ['name'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function getTranslatedNameAttribute(): string
    {
        $key = 'categories.' . $this->name;

        return Lang::has($key) ? __($key) : $this->name;
    }
}