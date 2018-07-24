<?php

namespace CodePress\CodeCategory\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeCategory\Models\Category;

/**
 * Description of CategoryRepositoryEloquent
 *
 * @author gabriel
 */
class CategoryRepositoryEloquent extends AbstractRepository implements CategoryRepositoryInterface
{

    public function model()
    {
        return Category::class;
    }
    
    public function getCategoriesAndCount(string $model)
    {
        return $this->model->withCount($model)->get();
    }

}
