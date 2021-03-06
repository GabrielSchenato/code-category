<?php

namespace CodePress\CodeCategory\Tests\Controllers;

use CodePress\CodeCategory\Repository\CategoryRepositoryEloquent;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use CodePress\CodeCategory\Controllers\AdminCategoriesController;
use CodePress\CodeCategory\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Mockery as m;

/**
 * Description of CategoryTest
 *
 * @author gabriel
 */
class AdminCategoriesControllerTest extends AbstractTestCase
{

    public function test_should_extend_from_controller()
    {
        $repository = m::mock(CategoryRepositoryEloquent::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $repository);

        $this->assertInstanceOf(Controller::class, $controller);
    }
    
    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $repository = m::mock(CategoryRepositoryEloquent::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $repository);
        $html = m::mock();
        
        $categoriesResult = ['cat1', 'cat2'];
        $repository->shouldReceive('all')->andReturn($categoriesResult);
        
        $responseFactory->shouldReceive('view')
                ->with('codecategory::index', ['categories' => $categoriesResult])
                ->andReturn($html);

        $this->assertEquals($controller->index(), $html);
    }
    
    public function test_controller_should_run_show_method_and_return_correct_argument()
    {
        $repository = m::mock(CategoryRepositoryEloquent::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $repository);
        $html = m::mock();
        
        $categoriesResult = ['cat1', 'cat2'];
        $repositoryResult = ['cat1'];
        
        $repository->shouldReceive('all')->andReturn($categoriesResult);
        $repository->shouldReceive('find')->with(1)->andReturn($repositoryResult);
        
        $responseFactory->shouldReceive('view')
                ->with('codecategory::show', ['category' => $repositoryResult, 'categories' => $categoriesResult])
                ->andReturn($html);

        $this->assertEquals($controller->show(1), $html);
    }

}
