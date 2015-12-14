<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/9/2015
 * Time: 6:44 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class User
 * @category  PHP
 * @package   Notes\Domain\Entity
 * @author    donbstringham <donbstringham@gmail.com>
 * @link      http://donbstringham.us
 */
class User
{
    /** @var \Notes\Domain\ValueObject\Uuid */
    protected $id;

    /** @var \Notes\Domain\ValueObject\StringLiteral */
    protected $username;

    /**
     * User constructor
     * @param \Notes\Domain\ValueObject\Uuid $uuid
     */
    public function __construct(Uuid $uuid)
    {
        $this->id = $uuid;
    }

    /**
     * @return \Notes\Domain\ValueObject\Uuid
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId(StringLiteral $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return StringLiteral
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param StringLiteral $username
     * @return $this
     */
    public function setUsername(StringLiteral $username)
    {
        $this->username = $username;

        return $this;
    }
}