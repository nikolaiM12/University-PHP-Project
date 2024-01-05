<?php
namespace App\Services;

use App\Models\Category;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Support\Facades\Validator;

class CategoryService implements ICategoryService
{
    public function GetAllCategories()
    {
        return Category::all();
    }

    public function CreateCategory(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
                'description' => 'required'
            ])->validate();

            $category = Category::create($data);

            session()->flash('success', 'Category created successfully');

            return $category;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create category: ' . $e->getMessage());
        } 
    }

    public function GetCategoryById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Category ID cannot be null.');
        }

        $category = Category::findOrFail($id);

        if (!$category)
        {
            throw new \RuntimeException('Category not found.');
        }

        return $category;
    }

    public function UpdateCategory($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
                'description' => 'required'
            ])->validate();

            $category = $this->GetCategoryById($id);
            $category->update($data);

            session()->flash('success', 'Category updated successfully');

            return $category;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update category: ' . $e->getMessage());
        } 
    }

    public function DeleteCategory($id)
    {
        try
        {
            $category = $this->GetCategoryById($id);
            $category->delete();
            session()->flash('success', 'Category deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}

?>
