<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 12/13/15
 * Time: 3:00 PM
 */

namespace Notes\Db\Adapter;

use Notes\Db\Adapter\PdoAdapter;
use Notes\Domain\FactoryInterface;
use Notes\Persistence\Entity\SQLUserRepository;


class DatabaseFactory implements FactoryInterface
{

    /**
     * @return mixed
     */
    public function create()
    {
        $adapter = new PdoAdapter('mysql:dbname=Notes; hots=localhost', 'root', 'cs3620');
        return new SQLUserRepository($adapter);
    }
}