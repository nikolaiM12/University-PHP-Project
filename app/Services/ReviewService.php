<?php
namespace App\Services;

use App\Models\Review;
use App\Services\Interfaces\IReviewService;
use Illuminate\Support\Facades\Validator;

class ReviewService implements IReviewService
{
    public function GetAllReviews()
    {
        return Review::with('user', 'book')->get();
    }

    public function CreateReview(array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'book_id' => 'required',
                'rating' => 'required',
                'comment' => 'required'
            ])->validate();
            
            $review = Review::create($data);
            
            session()->flash('success', 'Review created successfully');

            return $review;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to create review: ' . $e->getMessage());
        }
    }

    public function GetReviewById($id)
    {
        if ($id === null)
        {
            throw new \InvalidArgumentException('Review ID cannot be null.');
        }

        $review = Review::findOrFail($id);

        if (!$review)
        {
            throw new \RuntimeException('Review not found.');
        }

        return $review;
    }

    public function UpdateReview($id, array $data)
    {
        try
        {
            $data = Validator::make($data, [
                'user_id' => 'required',
                'book_id' => 'required',
                'rating' => 'required',
                'comment' => 'required'
            ])->validate();
            
            $review = $this->GetReviewById($id);
            $review->update($data);

            session()->flash('success', 'Review updated successfully');

            return $review;
        }
        catch (\Exception $e)
        {
            session()->flash('error', 'Failed to update review: ' . $e->getMessage());
        }
    }

    public function DeleteReview($id)
    {
        try
        {
            $review = $this->GetReviewById($id);
            $review->delete();
            session()->flash('success', 'Review deleted successfully');
        }
        catch(\Exception $e)
        {
            session()->flash('error', 'Failed to delete review: ' . $e->getMessage());
        }
    }
}

?>