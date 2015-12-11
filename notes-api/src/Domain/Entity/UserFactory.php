<?php
namespace Notes\Domain\Entity;

use Notes\Domain\FactoryInterface;
use Notes\Domain\ValueObject\Uuid;
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:17 PM
 */

class UserFactory implements FactoryInterface
{
    /**
     * @return user
     */
    public function create()
    {
        return new user(new Uuid());
    }
}
