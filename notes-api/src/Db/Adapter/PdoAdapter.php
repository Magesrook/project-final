<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/24/15
 * Time: 6:13 PM
 */

namespace Notes\Db\Adapter;


use Symfony\Component\Config\Definition\Exception\Exception;
use PDO;

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
    }

    public function delete($table, $criteria)
    {
        $sqlString = "DELETE FROM $table $criteria;";
        return $this->execute($sqlString);

    }

    public function execute($sqlString)
    {
        return $this->pdo->exec($sqlString);
    }

    public function insert($table, $data)
    {
        $sqlString = "INSERT INTO $table VALUES $data;";
        return $this->execute($sqlString);
    }

    public function select($table, $criteria)
    {
        $sqlString = "SELECT * FROM $table $criteria";
        return $this->sql($sqlString);
    }

    public function sql($sql)
    {
        $pdoString = $this->pdo->query($sql);
        return $pdoString->fetchall();
    }

    public function update($table, $data, $criteria)
    {
        $sqlString = "UDATE $table SET $data $criteria;";
        return $this->execute($sqlString);
    }
}