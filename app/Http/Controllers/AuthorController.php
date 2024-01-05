<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\IAuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected IAuthorService $authorService;
    public function __construct(IAuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $author = $this->authorService->GetAllAuthors();
        return view('author.index', compact("author"))->with('page', request()->input('page'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $author = $this->authorService->CreateAuthor($request->all());
        return redirect()->route('author.index')->with('success', 'Author created successfully');
    }

    public function show($id)
    {
        $author = $this->authorService->GetAuthorById($id);       
        return view('author.show', compact('author'));
    }

    public function edit($id)
    {
        $author = $this->authorService->GetAuthorById($id);
        return view('author.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = $this->authorService->UpdateAuthor($id, $request->all());
        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }

    public function delete($id)
    {
        $author = $this->authorService->GetAuthorById($id);
        return view('author.delete', compact('author'));
    }

    public function destroy($id)
    {
        $author = $this->authorService->DeleteAuthor($id);
        return redirect()->route('author.index', compact('author'))->with('success', 'Author deleted successfully');
    }
}
