<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category', 'image', 'excerpt', 'content', 'author', 'date'
    ];
    
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Si 'image' est une chaîne vide, on le transforme en null
            if ($model->image === '') {
                $model->image = null;
            }
        });
    }
}