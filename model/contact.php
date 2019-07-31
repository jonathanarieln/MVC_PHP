<?php
require_once("model/Model.php");
/**
 * Created by PhpStorm.
 * User: CONS
 * Date: 16/5/2019
 * Time: 19:01
 */

class contact extends Model{

   public $nombre;
   public $apellido;

    public function __construct(){
        parent::__construct("contacts");
    }

    public function __construct1($id){
        parent::__construct("contacts");
        parent::get_data($id);
        $_SESSION['contact'] = $this->data;
    }
    public function getAllContacts(){
        $data = array();
        $dbconection = parent::get_conect();

        $records = $dbconection->query("select * from contacts");

        while($record = $records->fetch_assoc()){
            $data[] = $record;
        }

        return $data;
    }
}
