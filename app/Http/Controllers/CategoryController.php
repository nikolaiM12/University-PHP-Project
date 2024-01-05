<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected ICategoryService $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $category = $this->categoryService->GetAllCategories();
        return view('category.index', compact("category"))->with('page', request()->input('page'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $category = $this->categoryService->CreateCategory($request->all());
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    public function show($id)
    {
        $category = $this->categoryService->GetCategoryById($id);       
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryService->GetCategoryById($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryService->UpdateCategory($id, $request->all());
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function delete($id)
    {
        $category = $this->categoryService->GetCategoryById($id);
        return view('category.delete', compact('category'));
    }

    public function destroy($id)
    {
        $category = $this->categoryService->DeleteCategory($id);
        return redirect()->route('category.index', compact('category'))->with('success', 'Category deleted successfully');
    }
}
