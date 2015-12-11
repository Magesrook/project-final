<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/24/15
 * Time: 6:08 PM
 */

use Notes\Db\Adapter\PdoAdapter;

describe('Notes\Db\Adapter\PdoAdapter', function(){
    beforeEach(function(){
        $this->dsn = 'mysql:dbname=testdb;host=127.0.0.1';
        $this->username = 'joe';
        $this->password = '1234pass';
    });
    describe('->__construct()', function(){
        it('Should return a PdoAdapter object', function(){
            $actual = new PdoAdapter($this->dsn, $this->username, $this->password);

            expect($actual)->to->be->instanceof('Notes\Db\Adapter\PdoAdapter');
        });
        describe('->delete()', function(){
            it('It should delete the correct row', function(){
                $adapter = new PdoAdapter($this->dsn, $this->username, $this->password);
                //$actual = $adapter->delete();
                //expect($actual)->to->work();
            });
        });
    });
});