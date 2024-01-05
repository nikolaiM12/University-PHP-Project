<?php

namespace App\Services\Interfaces;
interface IReviewService
{
    public function GetAllReviews();
    public function CreateReview(array $data);
    public function GetReviewById($id);
    public function UpdateReview($id, array $data);
    public function DeleteReview($id);
}

?>