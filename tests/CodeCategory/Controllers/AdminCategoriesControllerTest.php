<?php

namespace CodePress\CodeCategory\Tests\Models;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Tests\AbstractTestCase;
use CodePress\CodeCategory\Controllers\AdminCategoriesController;
use CodePress\CodeCategory\Controllers\Controller;
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
        $controller = new AdminCategoriesController($category);

        $this->assertInstanceOf(Controller::class, $controller);
    }

}
