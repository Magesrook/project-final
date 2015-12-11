<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 11/17/2015
 * Time: 6:45 PM
 */

use Notes\Domain\Entity\UserFactory;
use Notes\Domain\ValueObject\StringLiteral;
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
    describe('->add()', function () {
        it('should a 1 user to the repository', function () {
            $this->repo->add($this->userFactory->create());

            expect($this->repo->count())->to->equal(1);
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
    });//s
});