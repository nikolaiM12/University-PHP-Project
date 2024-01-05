<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IBookService;
use App\Services\Interfaces\IAuthorService;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected IBookService $bookService;
    protected IAuthorService $authorService;
    protected ICategoryService $categoryService;

    public function __construct(IBookService $bookService, IAuthorService $authorService, ICategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $book = $this->bookService->GetAllBooks();
        return view('book.index', compact("book"))->with('page', request()->input('page'));
    }

    public function create()
    {
        $author = $this->authorService->GetAllAuthors();
        $category = $this->categoryService->GetAllCategories();
        $book = $this->bookService->GetAllBooks();
        return view('book.create', ['author' => $author, 'category' => $category, 'book' => $book]);
    }

    public function store(Request $request)
    {
        $book = $this->bookService->CreateBook($request->all());
        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    public function show($id)
    {
        $book = $this->bookService->GetBookById($id);       
        return view('book.show', compact('book'));
    }

    public function details()
    {
        $books = $this->bookService->GetAllBooks();
        return view('book.details', compact('books'));
    }
    
    public function edit($id)
    {
        $author = $this->authorService->GetAllAuthors();
        $category = $this->categoryService->GetAllCategories();
        $book = $this->bookService->GetBookById($id);
        return view('book.edit', ['author' => $author, 'category' => $category, 'book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = $this->bookService->UpdateBook($id, $request->all());
        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }

    public function delete($id)
    {
        $book = $this->bookService->GetBookById($id);
        return view('book.delete', compact('book'));
    }

    public function destroy($id)
    {
        $book = $this->bookService->DeleteBook($id);
        return redirect()->route('book.index', compact('book'))->with('success', 'Book deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $book = $this->bookService->SearchBooks($query);
        return view('book.index', compact('book'));
    }
}
