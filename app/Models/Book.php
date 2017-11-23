<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    /**
     * Generated
     */

    protected $table = 'books';
    protected $fillable = [
	'isbn',
	'title',
	'author',
	'publisher',
	'image',
	'created_at',
	'updated_at',
	];

}
