<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/24/15
 * Time: 6:13 PM
 */

namespace Notes\Db\Adapter;


use Symfony\Component\Config\Definition\Exception\Exception;

class PdoAdapter implements RdbmsAdapterInterface
{
    /**
     * @var String
     */
    protected $dsn;
    /**
     * @var
     */
    protected $password;

    /**
     * @var
     */
    protected $pdo;

    /**
     * @var
     */
    protected $username;

    /**
     * PdoAdapter constructor.
     * @param $dsn
     * @param $username
     * @param $password
     */
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * connect()
     */
    public function connect()
    {
        try{
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
        }catch (Exception $e){
            die($e->getCode() . ':'. $e->getMessage());
        }

    }

    public function close()
    {
        unset($this->pdo);
        // TODO: Implement close() method.
    }
public function delete($table, $criteria)
{
    // TODO: Implement delete() method.
}public function execute()
{
    // TODO: Implement execute() method.
}public function insert($table, $data)
{
    // TODO: Implement insert() method.
}public function select($table, $criteria)
{
    // TODO: Implement select() method.
}public function sql($sql)
{
    // TODO: Implement sql() method.
}public function update($table, $data, $criteria)
{
    // TODO: Implement update() method.
}}