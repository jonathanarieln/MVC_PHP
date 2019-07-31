<?php
/**
 * Created by PhpStorm.
 * User: CONS
 * Date: 6/12/2019
 * Time: 8:53 AM
 */

class Model
{
    private $db;
    public $data;
    private $table;

    public function __construct($table){
        $this->db = database::objectConect();
        $this->table = $table;
        $this->data = array();
    }

    protected function get_conect()
     {
      return $this->db;
     }

    public function getById($id){
        $records = $this->db->query("select * from ".$this->table.
           " WHERE Id = ".$id);

        if ($records->num_rows > 0)
            $this->data[] = $records->fetch_assoc();
        else
            $this->data[] = null;
    }

    public static function getAll($table){
        $data = array();
        $dbconection = database::objectConect();

        $records = $dbconection->query("select * from ".$table);

        while($record = $records->fetch_assoc()){
            $data[] = $record;
        }

        return $data;
    }
}
