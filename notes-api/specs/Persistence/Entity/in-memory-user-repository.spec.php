<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/17/15
 * Time: 6:46 PM
 */

use Notes\Domain\Entity\UserFactory;
use Notes\Persistence\Entity\InMemoryUserRepository;

describe('Notes\Persistence\Entity\InMemoryUserRepository', function(){
    beforeEach(function(){
        $this->repo = new InmemoryUserRepository();
    });
    describe('->__construct()', function(){
        it('Should construct an InMemoryUserRepository object', function(){
            expect($this->repo)->to->be->instanceof(
                'Notes\Persistence\Entity\InMemoryUserRepository'
            );
        });
    });
    describe('->add()', function(){
        it('Should add 1 user to the repository', function(){
            $this->repo->add($this->userFactory->create());

            expect($this->repo->count())->to->equal(1);
        });
    });
    describe('->getByUserName', function(){
        it('Should return a single user object', function(){
            $user = $this->userFactory->create();
            $user->setUsernme(new StringLiteral('harrie'));

            $this->repo->add($user);

            /** @var  $actual */
            $actual = $this->repo->getByUsername('harrie');

            expect($actual)->to->be->instanceof('Notes\Domain\Entity\User');
            expect($actual->getUsername())->to->be->equal(new StringLiteral('harrie'));
        });
    });
});