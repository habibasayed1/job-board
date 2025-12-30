<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function viewAnyEmployer(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Job $job): bool
    {
        return true;
    }

    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }

    public function apply(User $user, Job $job): bool
    {
        return ! $job->hasUserApplied($user);
    }
}