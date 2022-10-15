<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model

{
    use SoftDeletes , HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');// ко многим и связь между таблицами
    }
}
