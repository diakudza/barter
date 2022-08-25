<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\VotedVoter;

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
     * RatingRepository constructor
     * @param User $user
     * @param VotedVoter $votedVoter
     */
    public function __construct(User $user, VotedVoter $votedVoter)
    {
        $this->user = $user;
        $this->votedVoter = $votedVoter;
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
}
