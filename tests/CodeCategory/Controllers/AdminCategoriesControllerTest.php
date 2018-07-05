<?php

namespace CodePress\CodeCategory\Tests\Controllers;

use CodePress\CodeCategory\Models\Category;
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
        $category = m::mock(Category::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $category);

        $this->assertInstanceOf(Controller::class, $controller);
    }
    
    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $category = m::mock(Category::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $category);
        $html = m::mock();
        
        $categoriesResult = ['cat1', 'cat2'];
        $category->shouldReceive('all')->andReturn($categoriesResult);
        
        $responseFactory->shouldReceive('view')
                ->with('codecategory::index', ['categories' => $categoriesResult])
                ->andReturn($html);

        $this->assertEquals($controller->index(), $html);
    }
    
    public function test_controller_should_run_show_method_and_return_correct_argument()
    {
        $category = m::mock(Category::class);
        $responseFactory = m::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory, $category);
        $html = m::mock();
        
        $categoriesResult = ['cat1', 'cat2'];
        $categoryResult = ['cat1'];
        
        $category->shouldReceive('all')->andReturn($categoriesResult);
        $category->shouldReceive('find')->with(1)->andReturn($categoryResult);
        
        $responseFactory->shouldReceive('view')
                ->with('codecategory::show', ['category' => $categoryResult, 'categories' => $categoriesResult])
                ->andReturn($html);

        $this->assertEquals($controller->show(1), $html);
    }

}
