<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/24/15
 * Time: 6:31 PM
 */

namespace Notes\Db\Adapter;


interface DbAdapterInterface
{
    public function connect();
    public function close();

}