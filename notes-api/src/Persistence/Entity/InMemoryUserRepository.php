<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:44 PM
 */

namespace Notes\Persistence\Entity;

use Faker\Provider\Uuid;
use InvalidArgumentException;
use Notes\Domain\Entity\UserRepositoryInterface;
use Notes\Domain\Entity\User;
use Notes\Domain\ValueObject\StringLiteral;


class InMemoryUserRepository implements  UserRepositoryInterface
{
    /** @var array   */
    protected $user;


    /**
     * InMemoryUserRepository constructor.
     */
    public function __construct()
    {
        $this->users=[];
    }

    /**
     * @param User \Notes\Domain\Entity\User $user
     * @returned mixed
     */
    public function add(User $user)
    {
        if(!$user instanceof User){
            throw new InvalidArgumentException(
                __METHOD__ . '(): $user has to be a User Object'
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
     * @return array
     */
    public function getByUsername($username)
    {
        $results = [];

        foreach($this->users as $user){

            if($user->getUsername()->__toString()===$username){
                $results[] = $user;
            }
        }
        if($this->count() ==1){
            return $this[0];
        }
        return $results;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->user;
    }

    /**
     * @param \Notes\Domain\ValueObject\StringLiteral $search
     * @param \Notes\Domain\Entity\User $newUser
     */
    public function modifyByUsername(StringLiteral $search, User $newUser)
    {
        //search for user object in array
    }


    public function getById(Uuid $id)
    {
        $results = [];

        foreach($this->getId() as $user){

            if($user->getId()->__toString() === $id->__toString()){
                $results[] = $user;
            }
        }

        if($this->count() == 1){
            return $results[0];
        }
        return $results;
    }

    public function removeById(Uuid $id)
    {
        $results = [];

        foreach($this->users as $i => $user){
            if($user->getId()->__toString() === $id->__toString()){
                unset($this->users[$i]);
                return true;
            }
        }
        return false;


    }


    public function removeByUsername($username)
    {

    }


    /**
     * @param \Note\Domain\Entity\Uuid $id
     * @param User $user
     * @return mixed
     */
    public function modifyById(\Note\Domain\Entity\Uuid $id, User $user)
    {
        // TODO: Implement modifyById() method.
    }
}