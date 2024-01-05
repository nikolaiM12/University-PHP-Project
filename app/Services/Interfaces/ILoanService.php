<?php

namespace App\Services\Interfaces;
interface ILoanService
{
    public function GetAllLoans();
    public function CreateLoan(array $data);
    public function GetLoanById($id);
    public function UpdateLoan($id, array $data);
    public function DeleteLoan($id);
}

?>