<?php

/**
 * Created by PhpStorm.
 * User: CONS
 * Date: 16/5/2019
 * Time: 19:01
 */
class database
{
    private $driver, $host, $user, $pass, $database, $charset;

    public function __construct()
    {
        $db_config = require_once 'config/env.php';
        $this->driver = $db_config["driver"];
        $this->host = $db_config["host"];
        $this->user = $db_config["user"];
        $this->pass = $db_config["pass"];
        $this->database = $db_config["database"];
        $this->charset = $db_config["charset"];
    }

    public function conect()
    {
        $conection = new mysqli($this->host, $this->user, $this->pass, $this->database);

        if ($conection->connect_errno) {
            return null;
            echo $conection->connect_errno;
        }else{
          echo "conexion exitosa";
        }

        return $conection;
    }

    public static function objectConect()
    {
        $db_config = require_once('config/env.php');

        $conection = new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["database"]);

        if ($conection->connect_errno) {
            return null;
        }

        return $conection;
    }
}
