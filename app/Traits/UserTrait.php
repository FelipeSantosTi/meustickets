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

    public function adminPermission(string $permissionName): bool
    {
        return in_array($permissionName, [
            'Dashboard',
            'Usuários'
            ]);
    }

    public function evPermission(string $permissionName): bool
    {
        return in_array($permissionName, [
            'Avaliação'
            ]);
    }

    public function acdPermission(string $permissionName): bool
    {
        return in_array($permissionName, [
            'Inscrição'
            ]);
    }
}
