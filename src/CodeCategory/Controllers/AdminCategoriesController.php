<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;

/**
 * Description of AdminCategoriesController
 *
 * @author gabriel
 */
class AdminCategoriesController extends Controller
{
    private $category;
    
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    
    public function index()
    {
        $categories = $this->category->all();
        return view('codecategory::index', compact('categories'));
    }
    
    public function create()
    {
        return view('codecategory::create');
    }
}
