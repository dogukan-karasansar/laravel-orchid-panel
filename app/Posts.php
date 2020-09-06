<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Posts extends Model
{
    use AsSource;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'description',
        'image'
    ];
}
