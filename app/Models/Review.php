<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    /**
     * Generated
     */

    protected $table = 'reviews';
    protected $fillable = ['index', 'album_name', 'artist', 'event_name', 'event_date', 'event_location', 'review_type', 'date_created', 'intro_if_any', 'last_changed', 'release_date', 'record_label', 'reviewer', 'text', 'title_if_any', 'image_path', 'image_table', 'image_content', 'image_file', 'image_size', 'image_type'];



}
