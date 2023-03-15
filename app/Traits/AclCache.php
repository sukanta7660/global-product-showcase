<?php


namespace App\Traits;


use Illuminate\Support\Facades\Cache;

trait AclCache
{
    public function invalidatePermissionCache(int $roleId) :void
    {
        Cache::forget("acl.getPermissionsInheritedById_{$roleId}");
        Cache::forget("acl.getPermissionsById_{$roleId}");
        Cache::forget("acl.getMergeById_{$roleId}");
    }

    public function invalidateRoleCache(int $userId) :void
    {
        Cache::forget("acl.getGroupsById_{$userId}");
    }
}
