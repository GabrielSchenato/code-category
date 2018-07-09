<?php

namespace CodePress\CodeCategory\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeCategory\Models\Category;

/**
 * Description of CategoryRepository
 *
 * @author gabriel
 */
class CategoryRepository extends AbstractRepository
{

    public function model()
    {
        return Category::class;
    }

}
