<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Thêm 'is_featured' vào mảng $fillable
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'category_id',
        'user_id',
        'views',
        'published_at',
        'is_featured', // Thêm trường is_featured
    ];

    // Sử dụng casts để chuyển đổi kiểu dữ liệu
    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean', // Chuyển đổi is_featured thành boolean
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}