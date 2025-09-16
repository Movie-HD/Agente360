<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PropiedadCliente;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropiedadClientePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PropiedadCliente');
    }

    public function view(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('View:PropiedadCliente');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PropiedadCliente');
    }

    public function update(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('Update:PropiedadCliente');
    }

    public function delete(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('Delete:PropiedadCliente');
    }

    public function restore(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('Restore:PropiedadCliente');
    }

    public function forceDelete(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('ForceDelete:PropiedadCliente');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PropiedadCliente');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PropiedadCliente');
    }

    public function replicate(AuthUser $authUser, PropiedadCliente $propiedadCliente): bool
    {
        return $authUser->can('Replicate:PropiedadCliente');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PropiedadCliente');
    }

}