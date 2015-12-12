<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:45 PM
 */
namespace Notes\Persistence\Entity;

use InvalidArgumentException;
use Notes\Domain\Entity\User;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;



/**
 * Class InMemoryUserRepository
 * @category  PHP
 * @package   Notes\Persistence\Entity
 * @author    Mark Schulz
 */
class SQLUserRepository implements UserRepositoryInterface
{
    /** @var array */
    protected $users;
    protected $adapters;


    /**
     * InMemoryUserRepository constructor
     */
    public function __construct(PdoAdapter $adapter)
    {
        $this->users = [];
    }

    /**
     * @param \Notes\Domain\Entity\User $user
     * @return mixed
     */
    public function add(User $user)
    {
        if (!$user instanceof User) {
            throw new InvalidArgumentException(
                __METHOD__ . '(): $user has to be a User object'
            );
        }

        $this->users[] = $user;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->users);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getByUsername($username)
    {
        $results = [];

        foreach ($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getUsername()->__toString() === $username) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }


    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return \Notes\Domain\Entity\User
     */
    public function getById(Uuid $id)
    {
        $results = [];

        foreach ($this->users as $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getId()->__toString() === $id->__toString()) {
                $results[] = $user;
            }
        }

        if ($this->count() == 1) {
            return $results[0];
        }

        return $results;
    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @param \Notes\Domain\Entity\User $user
     * @return bool
     */
    public function modifyById(Uuid $id, User $user)
    {
        foreach ($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getId()->__toString() === $id->__toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

    }

    /**
     * @param \Notes\Domain\ValueObject\Uuid $id
     * @return bool
     */
    public function removeById(Uuid $id)
    {
        foreach ($this->users as $i => $user) {
            /** @var \Notes\Domain\Entity\User $user */
            if ($user->getId()->__toString() === $id->__toString()) {
                unset($this->users[$i]);
                return true;
            }
        }

        return false;
    }
}
