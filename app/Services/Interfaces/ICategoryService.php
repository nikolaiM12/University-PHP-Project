<?php

namespace App\Services\Interfaces;
interface ICategoryService
{
    public function GetAllCategories();
    public function CreateCategory(array $data);
    public function GetCategoryById($id);
    public function UpdateCategory($id, array $data);
    public function DeleteCategory($id);
}

?>
