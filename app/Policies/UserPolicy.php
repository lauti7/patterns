<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    //Se ejecuta antes que todas y verifica si es admin
    public function before($user)
    {
        if ($user->isAdmin())
        {
            return true;
        }
    }

    public function edit(User $authUser, User $user)
    {

        //el primer parametro de User siempre va a ser el usuario autenticado
        return $authUser->id === $user->id;

    }

    public function update(User $authUser, User $user)
    {

        //el primer parametro de User siempre va a ser el usuario autenticado
        return $authUser->id === $user->id;

    }

    public function destroy(User $authUser, User $user)
    {

        //el primer parametro de User siempre va a ser el usuario autenticado
        return $authUser->id === $user->id;

    }
}
