<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';

    // fill()によって代入可能なプロパティ
    protected $fillable = [
        'content',
    ];
}
