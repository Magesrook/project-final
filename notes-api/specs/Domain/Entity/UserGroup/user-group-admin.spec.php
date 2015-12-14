<?php
/**
 * File name: user-group-admin.spec.php
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

use Notes\Domain\Entity\UserGroup\Admins;

describe('Notes\Domain\Entity\UserGroup\Admins', function () {
    describe('->__construct()', function () {
        it('should return an Admin object', function () {
            $actual = new Admins();
            expect($actual)->to->be->instanceof('\Notes\Domain\Entity\UserGroup\Admins');
        });
    });
    describe('->getAdminUsers()', function () {
        it('should return the admin\'s list of users he administrates to', function () {
            $faker = \Faker\Factory::create();
            //how to use faker to make array?
            $users = $faker->userName;
            $admin = new Admins();
            expect($admin->getUsers())->equal($users);
        }) ;
    });
    describe('->setAdminUsers($array)', function () {
        it('should set and then return the Admins list of users as an array', function () {
            $value = array('mbrow234', 'randomUser1', 'coolUser85');
            $actual = new Admins();
            $actual->setAdminUsers($value);
            expect($actual->getUsers())->equal($value);
        });
    });
    describe('->deleteUser($userName)', function () {
        it('should delete a user that the admin is responsible for', function () {
            $value = array('mbrow234', 'randomUser1', 'coolUser85');
            $actual = new Admins();
            $actual->setAdminUsers($value);
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
            $actual = new Admins();
            $actual->setAdminUsers($value);
            $before = $actual->getUsers();
            $user = 'coolUserNew';
            $actual->addUser($user);
            $after = $actual->getUsers();
            expect(!in_array($user, $before));
            expect(in_array($user, $after));
        });
    });
});