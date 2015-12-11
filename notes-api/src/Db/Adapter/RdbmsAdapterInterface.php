<?php
/**
 * Created by PhpStorm.
 * User: cs3620
 * Date: 11/24/15
 * Time: 6:10 PM
 */

namespace Notes\Db\Adapter;

/**
 * Interface DbAdapterInterface
 * @package Notes\Db\Adapter
 */

interface RdbmsAdapterInterface extends DbAdapterInterface
{
    public function delete($table, $criteria);
    public function execute();
    public function insert($table, $data);
    public function select($table, $criteria);
    public function sql($sql);
    public function update($table, $data, $criteria);
}