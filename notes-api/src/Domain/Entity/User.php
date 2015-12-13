<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:03 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

class user
{
    protected $id;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $email;

    /**4
     * user constructor.
     * @param Uuid $uuid
     * @param StringLiteral $username
     */
    public function __construct(Uuid $uuid, StringLiteral $username)
    {
        $this->id = $uuid;
        $this->username = $username;
    }

     /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return StringLiteral
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}