<?php

namespace App\Services;

use App\Models\User;
use App\Models\VotedVoter;
use App\Repositories\RatingRepository;
use phpDocumentor\Reflection\Types\Boolean;

class RatingService
{
    /**
     * @var RatingRepository;
     */
    protected $ratingRepository;

    /**
     * ImageService constructor
     * @param RatingRepository $ratingRepository;
     */
    public function __construct(RatingRepository $ratingRepository)
    {
        $this->ratingRepository = $ratingRepository;
    }

    public function updateUserRating(int $votedId, int $voterId, int $rating, $text)
    {
        $user = $this->ratingRepository->getUserRating($votedId);
        $oldRating = $user->rating * $user->voters_count;
        $newRating = ($oldRating + $rating) / ($user->voters_count + 1);
        $user->fill([
            'rating' => $newRating,
            'voters_count' => $user->voters_count + 1
        ]);
        if ($this->ratingRepository->createVotedVoter($votedId, $voterId)) {
            if($this->ratingRepository->createReview($votedId, $voterId, $text)){
                return $user;
            }
        }
        return false;
    }
}
