<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\sluggable;

class Post extends Model
{
    use Sluggable, HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_path',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
          'slug' => [
              'source' => 'title'
          ]
        ];
    }
}
