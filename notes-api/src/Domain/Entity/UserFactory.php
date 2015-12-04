<?php

/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:22 PM
 */

namespace Notes\Domain\Entity;

use Notes\Domain\FactoryInterface;
use Notes\Domain\ValueObject\Uuid;

/**
 * Class UserFactory
 * @category  PHP
 * @package   Notes\Domain\Entity
 * @author    donbstringham <donbstringham@gmail.com>
 * @link      http://donbstringham.us
 */
class UserFactory implements FactoryInterface
{
    /**
     * @return \Notes\Domain\Entity\User
     */
    public function create()
    {
        return new User(new Uuid());
    }
}
