<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [  // che possono essere riempiti a partire da un array associativo
        'title',
        'author',
        'cover',
        'data'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
