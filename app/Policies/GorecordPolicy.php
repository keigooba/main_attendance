<?php

namespace App\Policies;

use App\User;
use App\Gorecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class GorecordPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

        /**
     * フォルダの閲覧権限
     * @param User $user
     * @param Folder $folder
     * @return bool
     */
    public function view(User $user, Gorecord $gorecord)
    {
        // return $user->name === $gorecord->user_name;
    }
}
