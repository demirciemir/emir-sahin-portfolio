<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'slug',
        'type',
        'youtube_url',
        'image_path',
        'thumbnail_image',
        'video_length',
        'order'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
