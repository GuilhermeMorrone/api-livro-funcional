<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    public function all()
    {
        return Review::all();
    }

    public function find($id)
    {
        return Review::find($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = $this->find($id);
        if ($review) {
            $review->update($data);
            return $review;
        }
        return null;
    }

    public function delete($id)
    {
        $review = $this->find($id);
        if ($review) {
            return $review->delete();
        }
        return false;
    }
}
