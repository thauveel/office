<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hrm\WorkSite;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkSitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('read worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hrm\WorkSite  $workSite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, WorkSite $workSite)
    {
        return $user->can('read worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hrm\WorkSite  $workSite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, WorkSite $workSite)
    {
        return $user->can('update worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hrm\WorkSite  $workSite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, WorkSite $workSite)
    {
        return $user->can('delete worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hrm\WorkSite  $workSite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WorkSite $workSite)
    {
        return $user->can('update worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Hrm\WorkSite  $workSite
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WorkSite $workSite)
    {
        return $user->can('delete worksite')
        ? Response::allow()
        : Response::deny('You do not have permission.');
    }
}
