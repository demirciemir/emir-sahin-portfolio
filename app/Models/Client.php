<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'description',
        'logo_image',
        'order'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('order', 'asc');
    }
}
