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

}
