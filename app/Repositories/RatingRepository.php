<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\VotedVoter;
use App\Models\Review;

class RatingRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var VotedVoter
     */
    protected $votedVoter;

    /**
     * @var Review
     */
    protected $review;

    /**
     * RatingRepository constructor
     * @param User $user
     * @param VotedVoter $votedVoter
     * @param Review $review
     */
    public function __construct(User $user, VotedVoter $votedVoter, Review $review)
    {
        $this->user = $user;
        $this->votedVoter = $votedVoter;
        $this->review = $review;
    }

    public function getUserRating(int $userId): User
    {
        return $this->user->select(['rating', 'voters_count'])->where('id', $userId)->get()->first();
    }

    public function createVotedVoter(int $votedId, int $voterId): bool
    {
        $result = new $this->votedVoter([
            'voter_id' => $voterId,
            'voted_id' => $votedId
        ]);
        return $result->save();
    }

    public function createReview(int $userId, int $reviewerId, string $text): bool
    {
        $result = new $this->review([
            'user_id' => $userId,
            'reviewer_id' => $reviewerId,
            'text' => $text,
        ]);

        return $result->save();
    }
}
