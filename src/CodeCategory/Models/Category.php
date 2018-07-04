<?php

namespace CodePress\CodeCategory\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator;

/**
 * Description of Category
 *
 * @author gabriel
 */
class Category extends Model
{

    use Sluggable;

    protected $table = "codepress_categories";
    protected $fillable = [
        'name', 'slug', 'active', 'parent_id'
    ];
    
    private $validator;

    function getValidator()
    {
        return $this->validator;
    }
        
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
    }
    
    public function categorizable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
