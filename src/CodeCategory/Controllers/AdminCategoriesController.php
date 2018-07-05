<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Models\Category;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

/**
 * Description of AdminCategoriesController
 *
 * @author gabriel
 */
class AdminCategoriesController extends Controller
{

    private $response;
    private $category;
    
    public function __construct(ResponseFactory $response, Category $category)
    {
        $this->category = $category;
        $this->response = $response;
    }
    
    public function index()
    {
        $categories = $this->category->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }
    
    public function show(int $id)
    {
        $categories = $this->category->all();
        $category = $this->category->find($id);
        return view('codecategory::show', compact('category', 'categories'));
    }
    
    public function create()
    {
        $categories = $this->category->all();
        return $this->response->view('codecategory::create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $this->category->create($request->all());
        
        return redirect()->route('admin.categories.index');
    }
    
    public function edit(int $id)
    {
        $category = $this->category->find($id);
        $categories = $this->category->all();
        return $this->response->view('codecategory::edit', compact('category', 'categories'));
    }
    
    public function update(int $id, Request $request)
    {
        $this->category->find($id)->update($request->all());
        
        return redirect()->route('admin.categories.index');
    }
    
    public function destroy(int $id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
}
