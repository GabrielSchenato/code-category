<?php

namespace CodePress\CodeCategory\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CodePress\CodeCategory\Models\Category;

/**
 * Description of Post
 *
 * @author gabriel
 */
class Post extends Model
{

    const STATE_PUBLISHED = 1;
    const STATE_DRAFT = 2;

    use Sluggable,
        SoftDeletes;

    protected $table = "codepress_posts";
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 'image', 'content', 'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'codepress_categorizables');
    }

}
