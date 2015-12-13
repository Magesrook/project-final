<?php
namespace Notes\Domain\Entity\UserGroup;

use Notes\Domain\FactoryInterface;
use Notes\Domain\ValueObject\Uuid;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\Entity\User;

/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:17 PM
 */

class UserFactory implements FactoryInterface
{
    /**
     * @return User
     */
    public function create()
    {
        return new user(new Uuid(), StringLiteral::EMPTY_STR);
    }
}
