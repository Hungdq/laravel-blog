<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = ['_token'];
    protected $fillable = ['title', 'content', 'created_user'];
}
