<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, $filters)
    {
        // @EXAMPLE 1
        // return $query->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('body', 'like', '%' . request('search') . '%');

        // @EXAMPLE 2
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        // @EXAMPLE 3
        // if ($filters['search'] ??  false) {
        //     return $query->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $keywords) {
            return $query->where(function ($query) use ($keywords) {
                $query->where('title', 'like', '%' .  $keywords . '%')
                    ->orWhere('body', 'like', '%' . $keywords . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $slug) {
            return $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $username) {
            return $query->whereHas('author', function ($query) use ($username) {
                $query->where('username', $username);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
