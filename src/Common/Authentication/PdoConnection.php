<?php
/**
 * Created by PhpStorm.
 * User: celeste
 * Date: 3/22/2015
 * Time: 4:51 PM
 */

namespace Common\Authentication;

class PdoConnection {

    public $dbh;
    private $host = "localhost";
    private $db_name = "a_database";
    private $db_username = "root";
    private $db_password = "";

    public function __construct($db_host, $db_name, $db_username, $db_password)
    {
        $this->host = $db_host;
        $this->db_name = $db_name;
        $this->db_username = $db_username;
        $this->db_password = $db_password;
    }


    public function authenticate($username, $password)
    {

        try{
           // $dbh = new PDO("mysql:host=localhost;dbname=a_database", "root", "");
          //  $dbh = new PDO('mysql:host=localhost;dbname=a_database','root','');
         //  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dsn = 'mysql: host='.$this->host.';dbname=' . $this->db_name;
//            die($dsn);
            $this->dbh = new \PDO($dsn, $this->db_username, $this->db_password);
            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }
        catch ( PDOException $e) {
            $error = "Error!: " . $e->getMessage() . '<br />';
            echo $error;
            return FALSE;
        }
        return TRUE;
    }




}