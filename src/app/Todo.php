<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    // fill()によって代入可能なプロパティ
    protected $fillable = [
        'content',
    ];
}
