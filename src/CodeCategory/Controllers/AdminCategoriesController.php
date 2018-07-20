<?php

namespace CodePress\CodeCategory\Controllers;

use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
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
    private $repository;
    
    public function __construct(ResponseFactory $response, CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
    }
    
    public function index()
    {
        $categories = $this->repository->all();
        return $this->response->view('codecategory::index', compact('categories'));
    }
    
    public function show(int $id)
    {
        $categories = $this->repository->all();
        $category = $this->repository->find($id);
        return $this->response->view('codecategory::show', compact('category', 'categories'));
    }
    
    public function create()
    {
        $categories = $this->repository->all();
        return $this->response->view('codecategory::create', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        if(!isset($data['active'])){
            $data['active'] = false;
        } else {
            $data['active'] = true;
        }
        
        if(!isset($data['parent_id']) || (isset($data['parent_id']) && $data['parent_id'] == '')){
            $data['parent_id'] = null;
        }
        $this->repository->create($data);
        
        return redirect()->route('admin.categories.index');
    }
    
    public function edit(int $id)
    {
        $category = $this->repository->find($id);
        $categories = $this->repository->all();
        return $this->response->view('codecategory::edit', compact('category', 'categories'));
    }
    
    public function update(int $id, Request $request)
    {
        $data = $request->all();
        if(!isset($data['active'])){
            $data['active'] = false;
        } else {
            $data['active'] = true;
        }
        
        if(!isset($data['parent_id']) || (isset($data['parent_id']) && $data['parent_id'] == '')){
            $data['parent_id'] = null;
        }
        
        $this->repository->update($data, $id);
        
        return redirect()->route('admin.categories.index');
    }
    
    public function destroy(int $id)
    {
        $this->repository->find($id)->delete();
        return redirect()->route('admin.categories.index');
    }
    
    public function deleted()
    {
        $categories = $this->repository->deleted();
        return $this->response->view('codecategory::deleted', compact('categories'));
    }
    
    public function restore(int $id)
    {
        $this->repository->restore($id);
        return redirect()->route('admin.categories.index');
    }
}
