<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Address  $address
     * @return bool
     */
    public function view(User $user, Address $address): bool
    {
        return $address->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Address  $address
     * @return bool
     */
    public function update(User $user, Address $address): bool
    {
        return $address->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Address  $address
     * @return bool
     */
    public function delete(User $user, Address $address): bool
    {
        return $address->user_id === $user->id;
    }
}
