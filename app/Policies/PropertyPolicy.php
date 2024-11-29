<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given property can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return bool
     */
    public function update(User $user, Property $property)
    {
        // Check if the user is the owner of the property
        return $user->id === $property->user_id;
    }

    /**
     * Determine if the given property can be edited by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return bool
     */
    public function edit(User $user, Property $property)
    {
        // Check if the user is the owner of the property
        return $user->id === $property->user_id;
    }

    public function delete(User $user, Property $property)
    {
        // Ensure that only the owner can delete the property
        return $user->id === $property->user_id;
    }



    public function show(User $user, Property $property)
    {
        // Ensure that only the owner can delete the property
        return $user->id === $property->user_id;
    }
}
