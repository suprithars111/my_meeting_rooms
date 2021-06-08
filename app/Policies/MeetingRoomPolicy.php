<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MeetingRoom;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeetingRoomPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the meetingRoom can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list meetingrooms');
    }

    /**
     * Determine whether the meetingRoom can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function view(User $user, MeetingRoom $model)
    {
        return $user->hasPermissionTo('view meetingrooms');
    }

    /**
     * Determine whether the meetingRoom can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create meetingrooms');
    }

    /**
     * Determine whether the meetingRoom can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function update(User $user, MeetingRoom $model)
    {
        return $user->hasPermissionTo('update meetingrooms');
    }

    /**
     * Determine whether the meetingRoom can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function delete(User $user, MeetingRoom $model)
    {
        return $user->hasPermissionTo('delete meetingrooms');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete meetingrooms');
    }

    /**
     * Determine whether the meetingRoom can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function restore(User $user, MeetingRoom $model)
    {
        return false;
    }

    /**
     * Determine whether the meetingRoom can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\MeetingRoom  $model
     * @return mixed
     */
    public function forceDelete(User $user, MeetingRoom $model)
    {
        return false;
    }
}
