<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:10 PM
 */

use Notes\Domain\Entity\UserFactory;

describe('Notes\Domain\Entity\UserFactory', function (){
    describe('->__construct()', function(){
        it('Should create a new UserFactory object', function(){
            $actual = new UserFactory();
            expect($actual)->to->be->instanceof('Notes\Domain\Entity\UserFactory');
        });
    });
    describe('->create()', function(){
        it('Should create a new User Object', function(){
            $factory = new UserFactory();
            $actual =  $factory->create();

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
        });
    });
});