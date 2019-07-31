<?php
require_once("model/Model.php");
/**
 * Created by PhpStorm.
 * User: CONS
 * Date: 16/5/2019
 * Time: 19:01
 */

class contact extends Model{

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

        $records = $dbconection->query("SELECT * from contacts");

        while($record = $records->fetch_assoc()){
            $data[] = $record;
        }

        return $data;
       }

       public function getContactById($id){
           $data = array();
           $dbconection = parent::get_conect();

           $records = $dbconection->query("SELECT * from contacts WHERE id = $id");

           while($record = $records->fetch_assoc()){
               $data[] = $record;
           }

           return $data;
          }

       public function insertContact($nombre,$apellido){
         $dbconection = parent::get_conect();
         $stmt = $dbconection->prepare("INSERT INTO contacts(nombre, apellido) VALUES (?,?)");
          if ( false === $stmt ) {
              error_log('mysqli prepare() failed: ');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
              exit();
          }
          $bind = $stmt->bind_param('ss', $nombre,$apellido);
          if ( false === $bind ) {
              error_log('bind_param() failed:');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
              exit();
          }
          $exec = $stmt->execute();
          if ( false === $exec ) {
              error_log('mysqli execute() failed: ');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
          }
          $stmt->close();
       }

       public function editContact($nombre,$apellido,$id){

         $dbconection = parent::get_conect();
         $stmt = $dbconection->prepare("UPDATE contacts SET nombre=?,apellido=? WHERE id = ?");
          if ( false === $stmt ) {
              error_log('mysqli prepare() failed: ');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
              exit();
          }
          $bind = $stmt->bind_param('ssi', $nombre,$apellido,$id);
          if ( false === $bind ) {
              error_log('bind_param() failed:');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
              exit();
          }
          $exec = $stmt->execute();
          if ( false === $exec ) {
              error_log('mysqli execute() failed: ');
              error_log( print_r( htmlspecialchars($stmt->error), true ) );
          }
          $stmt->close();

       }


        public function deleteContactById($id){
           $data = array();
           $dbconection = parent::get_conect();
           $stmt = $dbconection->prepare("DELETE from contacts WHERE Id = ?");
            if ( false === $stmt ) {
                error_log('mysqli prepare() failed: ');
                error_log( print_r( htmlspecialchars($stmt->error), true ) );
                exit();
            }
            $bind = $stmt->bind_param('i', $id);
            if ( false === $bind ) {
                error_log('bind_param() failed:');
                error_log( print_r( htmlspecialchars($stmt->error), true ) );
                exit();
            }
            $exec = $stmt->execute();
            if ( false === $exec ) {
                error_log('mysqli execute() failed: ');
                error_log( print_r( htmlspecialchars($stmt->error), true ) );
            }
            //ESTO NOS SERVIRA PARA SABER SI ELIMINAMOS ALGO EN ESTE CASO COMO VIENE EL ID ES FIJO QUE ELIMINAMOS algo
            //pero si se elimina de la base de datos directamente no eliminariamos nada y lo podriamos saber pr aca
             if($stmt->affected_rows < 1){
               return false;
             }else{
               return true;
             }
            $stmt->close();
        }
}
