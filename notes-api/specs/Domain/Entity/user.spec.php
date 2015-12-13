<?php
/**
 * File name: user.spec.php
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

use Notes\Domain\Entity\User;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;

describe('Notes\Domain\Entity\User', function () {
    describe('->__construct()', function () {
        it('should return a User object', function () {
            $actual = new User(new Uuid(), StringLiteral::EMPTY_STR);
            expect($actual)->to->be->instanceof('\Notes\Domain\Entity\User');
        });
    });
    describe('->getId()', function () {
        it('should return the user\'s system generated uuid', function () {
            $faker = \Faker\Factory::create();
            $uuid = new Uuid();
            expect($uuid->isValidV4())->to->be->true();

            $username = new StringLiteral($faker->userName);
            $user = new User($uuid, $username);

            $actual = $user->getId();

            expect($actual)->to->be->instanceof('Notes\Domain\ValueObject\Uuid');
            expect($actual->__toString())->equal($uuid->__toString());
        });
    });
    describe('->getUsername()', function() {
        it('should get the correct username', function () {
            $faker = \Faker\Factory::create();
            $uuid = new Uuid();
            $userName = new StringLiteral($faker->userName);
            $user = new User($uuid, $userName);

            $actual = $user->getUsername();

            expect($actual)->to->be->instanceof('Notes\Domain\ValueObject\StringLiteral');
            expect($actual->__toString())->equal($userName->__toString());
        });
    });
    describe('->get/setEmail()', function(){
        it('should set & get the correct email', function(){
            $faker = \Faker\Factory::create();
            $uuid = new Uuid();
            $userName = new StringLiteral($faker->userName);
            $user = new User($uuid,$userName);
            $email = new StringLiteral($faker->email);

            $user->setEmail($email);

            $actual = $user->getEmail();

            expect($actual)->to->be->instanceof('Notes\Domain\ValueObject\StringLiteral');
            expect($actual->__toString())->equal($email->__toString());
        });
    });
    describe('->get/setFirstName()', function(){
        it('should get/set the user\' first name', function(){
            $faker = \Faker\Factory::create();
            $uuid = new Uuid();
            $userName = new StringLiteral($faker->userName);
            $user = new User($uuid,$userName);
            $firstName = new StringLiteral($faker->firstName);

            $user->setFirstName($firstName);

            $actual = $user->getFirstName();

            expect($actual)->to->be->instanceof('Notes\Domain\ValueObject\StringLiteral');
            expect($actual->__toString())->equal($firstName->__toString());
        });
    });
    describe('->get/setLastName()', function(){
        it('should get/set the user\' last name', function(){
            $faker = \Faker\Factory::create();
            $uuid = new Uuid();
            $userName = new StringLiteral($faker->userName);
            $user = new User($uuid,$userName);
            $lastName = new StringLiteral($faker->lastName);

            $user->setLastName($lastName);

            $actual = $user->getLastName();

            expect($actual)->to->be->instanceof('Notes\Domain\ValueObject\StringLiteral');
            expect($actual->__toString())->equal($lastName->__toString());
        });
    });
});
