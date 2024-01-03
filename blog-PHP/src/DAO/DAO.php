<?php
namespace App\src\DAO;
use PDO;
use Exception;
abstract class DAO{
    const DB_HOST = 'mysql:host=localhost';
    const DB_NAME = 'dbname=blog';
    const DB_CHARSET = 'charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    private $db ;

    private function checkDbConnect()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->db === null) {
            return $this->DbConnect();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->db;
    }

    private function DbConnect(){
        try{
            $this->db = new PDO(self::DB_HOST . ';' . self::DB_NAME . ';' . self::DB_CHARSET, self::DB_USER, self::DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        } catch (Exception $e) {
            die("Erreur " . $e->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null) {
        if($parameters)
        {
            $request = $this->checkDbConnect()->prepare($sql);
            $request->execute($parameters);
            return $request;
        }
        $request = $this->checkDbConnect()->query($sql);
        return $request;
    }

}

