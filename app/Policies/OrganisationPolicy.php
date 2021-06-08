<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Organisation;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganisationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the organisation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list organisations');
    }

    /**
     * Determine whether the organisation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function view(User $user, Organisation $model)
    {
        return $user->hasPermissionTo('view organisations');
    }

    /**
     * Determine whether the organisation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create organisations');
    }

    /**
     * Determine whether the organisation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function update(User $user, Organisation $model)
    {
        return $user->hasPermissionTo('update organisations');
    }

    /**
     * Determine whether the organisation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function delete(User $user, Organisation $model)
    {
        return $user->hasPermissionTo('delete organisations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete organisations');
    }

    /**
     * Determine whether the organisation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function restore(User $user, Organisation $model)
    {
        return false;
    }

    /**
     * Determine whether the organisation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Organisation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Organisation $model)
    {
        return false;
    }
}
