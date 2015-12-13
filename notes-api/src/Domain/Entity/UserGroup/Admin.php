<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 12/11/15
 * Time: 10:05 PM
 */

namespace Notes\Domain\Entity\UserGroup;

use Notes\Domain\Entity\User;

class Admin implements UserGroupInterface
{

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * @return array or list
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method.
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        // TODO: Implement addUser() method.
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user)
    {
        // TODO: Implement deleteUser() method.
    }

    /**
     * @param User $user
     * @return bool
     */
    public function userExistsInGroup(User $user)
    {
        // TODO: Implement userExistsInGroup() method.
    }
}