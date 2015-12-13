<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 12/11/15
 * Time: 10:07 PM
 */

namespace Notes\Domain\Entity\Role;


interface RoleInterface
{
    /**
     * @param int $permissionLevel
     * @return mixed
     */
    public function addPermissions(int $permissionLevel);

    /**
     * @return mixed
     */
    public function getPermissions();

    /**
     * @param int $permissionLevel
     * @return bool (wether removed or not)
     */
    public function deletePermissions(int $permissionLevel);
}