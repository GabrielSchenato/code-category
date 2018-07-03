<?php

namespace CodePress\CodeCategory\Tests\Models;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeCategory\Tests\AbstractTestCase;

/**
 * Description of CategoryTest
 *
 * @author gabriel
 */
class CategoryTest extends AbstractTestCase
{

    protected function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_check_if_a_category_can_be_persisted()
    {
        $category = Category::create(['name' => 'Category Test', 'active' => true]);
        $this->assertEquals('Category Test', $category->name);

        $category = Category::all()->first();
        $this->assertEquals('Category Test', $category->name);
    }

}
