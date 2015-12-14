<?php
/**
 * File name: user-group-owner.spec.php
 * Project: notes-api
 * PHP version 5
 * @category  PHP
 * @author    donbstringham <donbstringham@gmail.com>
 * @copyright 2015 © donbstringham
 * @license   http://opensource.org/licenses/MIT MIT
 * @version   GIT: <git_id>
 * @link      http://donbstringham.us
 * $LastChangedDate$
 * $LastChangedBy$
 */

use Notes\Domain\Entity\UserGroup\Owners;
use Notes\Domain\ValueObject\User;

describe('\Notes\Domain\Entity\UserGroup\Owners', function () {
    describe('->__construct()', function () {
        it('should return a Owners object', function () {
            $actual = new Owners();

            expect($actual)->to->be->instanceof(
                '\Notes\Domain\Entity\UserGroup\Owners'
            );
        });
    });

    describe('->getOwnerUsers()', function () {
        it('should return the admin\'s list of users he administrates to', function () {
            $faker = \Faker\Factory::create();
            //how to use faker to make array?
            $users = $faker->userName;
            $admin = new Owners();
            expect($admin->getUsers())->equal($users);
        }) ;
    });
    describe('->setOwnerUsers($array)', function () {
        it('should set and then return the Admins list of users as an array', function () {
            $value = array('mbrow234', 'randomUser1', 'coolUser85');
            $actual = new Owners();
            $actual->setOwnerUsers($value);
            expect($actual->getUsers())->equal($value);
        });
    });
    describe('->deleteUser($userName)', function () {
        it('should delete a user that the admin is responsible for', function () {
            $value = array('mbrow234', 'randomUser1', 'coolUser85');
            $actual = new Owners();
            $actual->setOwnerUsers($value);
            $before = $actual->getUsers();
            $user = 'coolUser85';
            $actual->deleteUser($user);
            $after = $actual->getUsers();
            expect(in_array($user, $before));
            expect(!in_array($user, $after));
        });
    });
    describe('->addUser($userName)', function () {
        it('should add a user to the admin', function () {
            $value = array('mbrow234', 'randomUser1', 'coolUser85');
            $actual = new Owners();
            $actual->setOwnerUsers($value);
            $before = $actual->getUsers();
            $user = 'coolUserNew';
            $actual->addUser($user);
            $after = $actual->getUsers();
            expect(!in_array($user, $before));
            expect(in_array($user, $after));
        });
    });
});
