<?php
namespace App\Services;

use App\Models\Loan;
use App\Services\Interfaces\ILoanService;
use Illuminate\Support\Facades\Validator;

class LoanService implements ILoanService
{
    public function GetAllLoans()
    {
        return Loan::with('user', 'book')->get();
    }

    public function CreateLoan(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'book_id' => 'required',
                'due_date' => 'required',
                'returned_at' => 'required'
            ])->validate();

            $loan = Loan::create($data);

            session()->flash('success', 'Loan created successfully');

            return $loan;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create loan: ' . $e->getMessage());
        } 
    }

    public function GetLoanById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Loan ID cannot be null.');
        }

        $loan = Loan::findOrFail($id);

        if (!$loan)
        {
            throw new \RuntimeException('Loan not found.');
        }

        return $loan;
    }

    public function UpdateLoan($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'book_id' => 'required',
                'due_date' => 'required',
                'returned_at' => 'required'
            ])->validate();

            $loan = $this->GetLoanById($id);
            $loan->update($data);

            session()->flash('success', 'Loan updated successfully');

            return $loan;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update loan: ' . $e->getMessage());
        } 
    }

    public function DeleteLoan($id)
    {
        try
        {
            $loan = $this->GetLoanById($id);
            $loan->delete();
            session()->flash('success', 'Loan deleted successfully');
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update loan: ' . $e->getMessage());
        } 
    }
}

?>