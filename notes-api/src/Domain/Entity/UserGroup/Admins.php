<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/7/2015
 * Time: 11:20 PM
 */

namespace Notes\Domain\Entity\UserGroup;

use Notes\Domain\Entity\User;

/**
 * Class Admins
 * @category  PHP
 * @package   Notes\Domain\Entity\UserGroup
 * @author    donbstringham <donbstringham@gmail.com>
 * @link      http://donbstringham.us
 */
class Admins implements UserGroupInterface
{

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return bool
     */
    public function addUser(User $user)
    {
        // TODO: Implement addUser() method
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        // TODO: Implement getUsers() method
    }

    /**
     * @return bool
     */
    public function removeUser()
    {
        // TODO: Implement removeUser() method
    }

    public function setAdminUsers($user)
    {

    }

    public function deleteUser($user)
    {

    }
}