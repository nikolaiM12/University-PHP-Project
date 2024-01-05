<?php

namespace App\Services\Interfaces;
interface IAuthorService
{
    public function GetAllAuthors();
    public function CreateAuthor(array $data);
    public function GetAuthorById($id);
    public function UpdateAuthor($id, array $data);
    public function DeleteAuthor($id);
}

?>
