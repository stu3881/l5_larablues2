<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     public $fillable = ['isbn','title','author', 'publisher', 'image' ];
}
