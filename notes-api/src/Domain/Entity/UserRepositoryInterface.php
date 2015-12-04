<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:27 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\ValueObject\Uuid;

interface UserRepositoryInterface
{
    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user);

    /**
     * @return int
     */
    public function count();

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return \Notes\Domain\Entity\User
     */
    public function getById(Uuid $id);

    /**
     * @return mixed
     */
    public function getUsers();

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @param \Notes\Domain\Entity\User $user
     * @return bool
     */
    public function modifyById(Uuid $id, User $user);

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return bool
     */
    public function removeById(Uuid $id);
}
