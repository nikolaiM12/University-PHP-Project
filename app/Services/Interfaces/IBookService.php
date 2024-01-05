<?php

namespace App\Services\Interfaces;
interface IBookService
{
    public function GetAllBooks();
    public function CreateBook(array $data);
    public function GetBookById($id);
    public function UpdateBook($id, array $data);
    public function DeleteBook($id);
    public function SearchBooks($query);
}

?>