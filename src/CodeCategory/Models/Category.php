<?php

namespace CodePress\CodeCategory\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Category
 *
 * @author gabriel
 */
class Category extends Model
{

    protected $table = "codepress_categories";
    protected $fillable = [
        'name', 'active', 'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
