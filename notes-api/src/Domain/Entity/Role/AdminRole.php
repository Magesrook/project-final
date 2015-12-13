<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 12/11/15
 * Time: 10:12 PM
 */

namespace Notes\Domain\Entity\Role;


class AdminRole implements RoleInterface
{
    private $permissionLevel;

    function __construct()
    {
        $this->permissionLevels = [];
    }

    /**
     * @param int $permissionLevel
     * @return mixed
     */
    public function addPermissions(int $permissionLevel)
    {
        $this->permissionLevels[] = $permissionLevel;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissionLevel;
    }

    /**
     * @param int $permissionLevel
     * @return bool (wether removed or not)
     */
    public function deletePermissions(int $permissionLevel)
    {
        for($i = 0; $i < count($this->permissionLevels); $i++){
            if($permissionLevel == $this->permissionLevels){
                unset($this->permissionLevels[$i]);
                return true;
            }
        }
        return false;
    }
}