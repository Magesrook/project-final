<?php

namespace Notes\Domain\Entity;

interface UserRepositoryInterface
{
    /**
     * @param User $user
     * @return mixed
     */

    public function add(User $user);

    /**
     * @return mixed
     */
    public function count();

    /**
     * @param Uuid $id
     * @return mixed
     */
    public function getById(Uuid $id);

    /**
     * @return mixed
     */
    public function getUsers();

    /**
     * @param Uuid $id
     * @param User $user
     * @return mixed
     */
    public function modifyById(Uuid $id, User $user);

    /**
     * @param Uuid $id
     * @return mixed
     */
    public function removeById(Uuid $id);
}