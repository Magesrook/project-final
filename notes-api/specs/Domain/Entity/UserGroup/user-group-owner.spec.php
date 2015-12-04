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

describe('Notes\Domain\ValueObject\Owners', function () {
    describe('->__construct()', function () {
        it('should return a Owner object', function () {
            $actual = new Owners();

            expect($actual)->to->be->instanceof(
                '\Notes\Domain\ValueObject\Owners'
            );
        });
    });

    describe('->__construct("foo")', function () {
        it('should return a Username object with the value of "foo"', function () {
            $value = 'foo';
            $actual = new Owners();
            $userName = $actual->addUser($value);

            expect($userName)->to->be->instanceof(
                '\Notes\Domain\ValueObject\StringLiteral'
            );
            expect($userName->__toString())->equal(true);
        });
    });

    describe('->__construct("foo")', function () {
        it('should return a Username object with the value of "foo"', function () {
            $value = 'foo';
            $actual = new Owners();
            $userName = $actual->getUsers();

            expect($userName)->to->be->instanceof(
                '\Notes\Domain\ValueObject\StringLiteral'
            );
            expect($userName->__toString())->equal($value);
        });
    });

    describe('->__construct("foo")', function () {
        it('should return a Username object with the value of "foo"', function () {
            $value = 'foo';
            $actual = new Owners();
            $userName = $actual->removeUser($value);

            expect($userName)->to->be->instanceof(
                '\Notes\Domain\ValueObject\StringLiteral'
            );
            expect($userName->__toString())->equal(true);
        });
    });

    describe('->__construct("foo")', function () {
        it('should return a Username object with the value of "foo"', function () {
            $value = 'foo';
            $actual = new Owners();
            $userName = $actual->getName();

            expect($userName)->to->be->instanceof(
                '\Notes\Domain\ValueObject\StringLiteral'
            );
            expect($userName->__toString())->equal($value);
        });
    });
});
