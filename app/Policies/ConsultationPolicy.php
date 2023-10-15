<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPolicy
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
     * Determine whether the user can view the livre.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $livre
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getPermissions($user, 19);
    }

    /**
     * Determine whether the user can create permissions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getPermissions($user, 16);
    }

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getPermissions($user, 17);
    }

    /**
     * Determine whether the user can delete the permission.
     *
     * @param  \App\User  $user
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getPermissions($user, 18);
    }

    // GET PERMISSIONS

    protected function getPermissions($user, $permission_id)
    {
        foreach ($user->roles as $role) {

            foreach ($role->permissions as $role_permit) {
                if ($role_permit->id == $permission_id) {
                    return true;
                }
            }
        }

        return false;
    }
}
