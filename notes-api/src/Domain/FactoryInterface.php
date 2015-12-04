<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:25 PM
 */

namespace Notes\Domain;


interface FactoryInterface
{
    /**
     * @return mixed
     */
    public function create();
}