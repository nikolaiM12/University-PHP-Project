<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\ILoanService;
use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\IBookService;


class LoanController extends Controller
{
    protected ILoanService $loanService;
    protected IUserService $userService;
    protected IBookService $bookService;

    public function __construct(ILoanService $loanService, IUserService $userService, IBookService $bookService)
    {
        $this->loanService = $loanService;
        $this->userService = $userService;
        $this->bookService = $bookService;
    }

    public function index()
    {
        $loan = $this->loanService->GetAllLoans();
        return view('loan.index', compact("loan"))->with('page', request()->input('page'));
    }

    public function create()
    {
        $loan = $this->loanService->GetAllLoans();
        $user = $this->userService->GetAllUsers();
        $book = $this->bookService->GetAllBooks();
        return view('loan.create', ['loan' => $loan, 'user' => $user, 'book' => $book]);
    }

    public function store(Request $request)
    {
        $loan = $this->loanService->CreateLoan($request->all());
        return redirect()->route('loan.index')->with('success', 'Loan created successfully');
    }
    public function show($id)
    {
        $loan = $this->loanService->GetLoanById($id);       
        return view('loan.show', compact('loan'));
    }

    public function edit($id)
    {
        $loan = $this->loanService->GetLoanById($id);
        $user = $this->userService->GetAllUsers();
        $book = $this->bookService->GetAllBooks();
        return view('loan.edit', ['loan' => $loan, 'book' => $book, 'user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $loan = $this->loanService->UpdateLoan($id, $request->all());
        return redirect()->route('loan.index')->with('success', 'Loan updated successfully');
    }
    public function delete($id)
    {
        $loan = $this->loanService->GetLoanById($id);
        return view('loan.delete', compact('loan'))->with('success', 'Loan deleted successfully');
    }

    public function destroy($id)
    {
        $loan = $this->loanService->DeleteLoan($id);
        return redirect()->route('loan.index', compact('loan'));
    }
}
