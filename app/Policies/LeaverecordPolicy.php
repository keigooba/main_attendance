<?php

namespace App\Policies;

use App\User;
use App\Leaverecord;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaverecordPolicy
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
    public function view(User $user, Leaverecord $leaverecord)
    {
        // 管理者が使いたいので指定できない
        // return $user->name === $leaverecord->user_name;
    }
}
