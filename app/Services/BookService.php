<?php
namespace App\Services;

use App\Services\Interfaces\IBookService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Models\Book;


class BookService implements IBookService
{
    public function GetAllBooks()
    {
        return Book::with('author', 'category')->get();
    }
    
    public function CreateBook(array $data)
    {
        try
        {
            $validator = Validator::make($data, [
                'title' => 'required',
                'author_id' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'ISBN' => 'required',
                'total_copies' => 'required',
                'available_copies' => 'required',
            ]);

            if ($validator->fails()) 
            {
                throw new \Exception($validator->errors()->first());
            }

            if ($image = Arr::get($data, 'image')) 
            {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $data['image'] = $destinationPath . $profileImage;
            }

            $book = Book::create($data);

            session()->flash('success', 'Book created successfully');

            return $book;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create book: ' . $e->getMessage());
        }
    }

    public function GetBookById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Book ID cannot be null.');
        }

        $book = Book::findOrFail($id);

        if (!$book)
        {
            throw new \RuntimeException('Book not found.');
        }

        return $book;
    }

    public function UpdateBook($id, array $data)
    {
        try 
        {
            $book = $this->GetBookById($id);
    
            $validator = Validator::make($data, [
                'title' => 'required',
                'author_id' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'ISBN' => 'required',
                'total_copies' => 'required',
                'available_copies' => 'required',
            ]);
    
            if ($validator->fails()) 
            {
                throw new \Exception($validator->errors()->first());
            }

            if ($image = Arr::get($data, 'image')) 
            {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                if (file_exists($book->image)) 
                {
                    unlink($book->image);
                }

                $book->image = $destinationPath . $profileImage;
                $book->title = $data['title'];
                $book->author_id = $data['author_id'];
                $book->category_id = $data['category_id'];
                $book->description = $data['description'];
                $book->ISBN = $data['ISBN'];
                $book->total_copies = $data['total_copies'];
                $book->available_copies = $data['available_copies'];
            }

            $book->save();

            session()->flash('success', 'Book updated successfully');

            return $book;
        } 
        catch (\Exception $e) 
        {
            session()->flash('error', 'Failed to update book: ' . $e->getMessage());
        }
    }

    public function DeleteBook($id)
    {
        try
        {
            $book = $this->GetBookById($id);
            $book->delete();
            session()->flash('success', 'Book deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to update book: ' . $e->getMessage());
        }
    }

    public function SearchBooks($query)
    {
        $result = Book::where('title', 'like', '%' . str_replace('%', '\%', $query) . '%')
        ->orWhereHas('author', function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . str_replace('%', '\%', $query) . '%');
        })
        ->get();

        if ($result->isEmpty()) {
            throw new \RuntimeException('No books found matching the search criteria.');
        }

        return $result;
    }
}

?>
