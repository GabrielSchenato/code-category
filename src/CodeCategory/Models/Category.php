<?php

namespace CodePress\CodeCategory\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Description of Category
 *
 * @author gabriel
 */
class Category extends Model
{
    use SoftDeletes;

    use Sluggable;

    protected $table = "codepress_categories";
    protected $dates = ['deleted_at'];
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
    
    public function isValid()
    {
        $validator = $this->validator;
        $validator->setRules(['name' => 'required|max:255']);
        $validator->setData($this->attributes);
        
        if($validator->fails())
        {
            $this->errors = $validator->errors();
            return false;
        }
        
        return true;
    }
    
    public function posts()
    {
        return $this->morphedByMany('CodePress\CodePosts\Models\Post', 'categorizable', 'codepress_categorizables');
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
