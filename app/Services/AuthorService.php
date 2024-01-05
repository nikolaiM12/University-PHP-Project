<?php
namespace App\Services;

use App\Models\Author;
use App\Services\Interfaces\IAuthorService;
use Illuminate\Support\Facades\Validator;

class AuthorService implements IAuthorService
{
    public function GetAllAuthors()
    {
        return Author::all();
    }

    public function CreateAuthor(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
                'biography' => 'required'
            ])->validate();

            $author = Author::create($data);

            session()->flash('success', 'Author created successfully');

            return $author;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create author: ' . $e->getMessage());
        }
    }

    public function GetAuthorById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Author ID cannot be null.');
        }

        $author = Author::findOrFail($id);

        if (!$author)
        {
            throw new \RuntimeException('Author not found.');
        }

        return $author;
    }

    public function UpdateAuthor($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'name' => 'required',
                'biography' => 'required'
            ])->validate();

            $author = $this->GetAuthorById($id);
            $author->update($data);

            session()->flash('success', 'Author updated successfully');

            return $author;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update author: ' . $e->getMessage());
        }
    }

    public function DeleteAuthor($id)
    {
        try
        {
            $author = $this->GetAuthorById($id);
            $author->delete();
            session()->flash('success', 'Author deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete author: ' . $e->getMessage());
        }
    }
}

?>
