<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
        'tag_id',
    ];


    public function categories()
    {
        return $this->belongsTo(Category::class);// к конкретной категории относится
    }

    public function users()
    {
        return $this->belongsTo(User::class);// к конкретной юзеру относится
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();// к конкретной категории относится
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
