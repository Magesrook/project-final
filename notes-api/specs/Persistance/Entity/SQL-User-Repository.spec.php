<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:45 PM
 */

use Notes\Domain\Entity\UserFactory;
use Notes\Domain\Entity\User;
use Notes\Domain\ValueObject\StringLiteral;
use Notes\Domain\ValueObject\Uuid;
use Notes\Persistence\Entity\SQLUserRepository;

describe('Notes\Persistence\Entity\SQLUserRepository', function () {
    beforeEach(function () {
        $this->repo = new SQLUserRepository();
        $this->userFactory = new UserFactory();
    });
    describe('->__construct()', function () {
        it('should construct an SQLUserRepository object', function () {
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\SQLUserRepository'
            );
        }) ;
    });

    describe('->add()', function() {
        it('Should add a user to the repository', function() {
            $actual = new SQLUserRepository();
            $user = new User(new Uuid);
            $count = $actual->count();
            $actual->add($user);
            $count++;
            expect($actual->count())->to->equal($count);
        });
    });

    //public function count()

    describe('->addUser(Nightshade)', function() {
        it('should adds to the sql table', function () {
            $actual = new SQLUserRepository();
            $username = "Nightshade";
            $password = "L37m31n!";
            $email = "nightshade@gmail.com";
            $firstName = "John";
            $lastName = "Smith";
            $this->userId = new Uuid;
            $user = new User($this->userId, $username, $password, $email, $firstName, $lastName);
            $count = $actual->count();
            expect($actual->count())->to->equal($count);
            $actual->add($user);
            $count++;
            expect($actual->count())->to->equal($count);
            //expect($actual->getUser($user1Key))->equal($user1);
        });
    });



    describe('->getByUsername()', function () {
        it('should return a single User object', function () {
            /** @var \Notes\Domain\Entity\User $user */
            $user = $this->userFactory->create();
            $user->setUsername(new StringLiteral('harrie'));

            $this->repo->add($user);

            expect($this->repo->count())->to->be->equal(1);

            /** @var \Notes\Domain\Entity\User $actual */
            $actual = $this->repo->getByUsername('harrie');

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
//            expect($actual->getUsername())->to->be->equal(new StringLiteral('harrie'));
        });
    });
    describe('->getById()', function () {
        it('should return a single user that has the userid given', function () {
            $actual = new SQLUserRepository();
            $username = "Nightshade";
            $password = "L37m31n!";
            $email = "nightshade@gmail.com";
            $firstName = "John";
            $lastName = "Smith";
            $this->userId = new Uuid;
            $user = new User($this->userId, $username, $password, $email, $firstName, $lastName);
            $count = $actual->count();
            expect($actual->count())->to->equal($count);
            $actual->add($user);
            $returnedUser = $actual->getById($this->userId);
            expect($returnedUser)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($returnedUser->getUserName())->to->equal($user->getUserName());
        });
    });

    describe('->modifyById($id, $user)', function () {
        it('should return a single user that has the userid given', function () {
            $actual = new SQLUserRepository();
            $username = "Nightshade";
            $password = "L37m31n!";
            $email = "nightshade@gmail.com";
            $firstName = "John";
            $lastName = "Smith";
            $this->userId = new Uuid;
            $user = new User($this->userId, $username, $password, $email, $firstName, $lastName);
            $count = $actual->count();
            expect($actual->count())->to->equal($count);
            $actual->add($user);
            $returnedUser = $actual->getById($this->userId);
            expect($returnedUser)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($returnedUser->getUserName())->to->equal($user->getUserName());
        });
    });

    describe('->removeById()', function () {
        it('should return a single user that has the userid given', function () {
            $actual = new SQLUserRepository();
            $username = "Nightshade";
            $password = "L37m31n!";
            $email = "nightshade@gmail.com";
            $firstName = "John";
            $lastName = "Smith";
            $this->userId = new Uuid;
            $user = new User($this->userId, $username, $password, $email, $firstName, $lastName);
            $count = $actual->count();
            expect($actual->count())->to->equal($count);
            $actual->add($user);
            $returnedUser = $actual->getById($this->userId);
            expect($returnedUser)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($returnedUser->getUserName())->to->equal($user->getUserName());
        });
    });
});