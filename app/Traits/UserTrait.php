<?php

namespace App\Traits;

trait UserTrait
{
    public function permissions()
    {
        $access = $this->access;

        $permissions = [];
        foreach ($access->profiles as $profile) {
            foreach ($profile->permissions as $permission) {
                array_push($permissions, $permission);
            }
        }

        return $permissions;
    }

    public function isAdmin() : bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, ['Acessos', 'Avaliação', 'Inscrição', 'Perfis']);
    }
}
