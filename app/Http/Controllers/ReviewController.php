<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\IReviewService;
use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\IBookService;


class ReviewController extends Controller
{
    protected IReviewService $reviewService;
    protected IUserService $userService;
    protected IBookService $bookService;

    public function __construct(IReviewService $reviewService, IUserService $userService, IBookService $bookService)
    {
        $this->reviewService = $reviewService;
        $this->userService = $userService;
        $this->bookService = $bookService;
    }

    public function index()
    {
        $review = $this->reviewService->GetAllReviews();
        return view('review.index', compact("review"))->with('page', request()->input('page'));
    }

    public function create()
    {
        $user = $this->userService->GetAllUsers();
        $book = $this->bookService->GetAllBooks();
        return view('review.create', ['user' => $user, 'book' => $book]);      
    }

    public function store(Request $request)
    {
        $review = $this->reviewService->CreateReview($request->all());
        return redirect()->route('review.index')->with('success', 'Review created successfully');
    }

    public function show($id)
    {
        $review = $this->reviewService->GetReviewById($id);
        return view('review.show', compact('review'));
    }

    public function edit($id)
    {
        $review = $this->reviewService->GetReviewById($id);
        $user = $this->userService->GetAllUsers();
        $book = $this->bookService->GetAllBooks();
        return view('review.edit', ['review' => $review, 'book' => $book, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $review = $this->reviewService->UpdateReview($id, $request->all());
        return redirect()->route('review.index')->with('success', 'Review updated successfully');
    }

    public function delete($id)
    {
        $review = $this->reviewService->GetReviewById($id);
        return view('review.delete', compact('review'));
    }

    public function destroy($id)
    {
        $review = $this->reviewService->DeleteReview($id);
        return redirect()->route('review.index', compact('review'))->with('success', 'Review deleted successfully');
    }
}

