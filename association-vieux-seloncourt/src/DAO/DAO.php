<?php
namespace App\src\DAO;
use PDO;

abstract class DAO{
    const DB_HOST = 'localhost';
    const DB_NAME = 'seloncourt';
    const DB_CHARSET = 'charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';
    private $db;

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
        // On se connecte à la db grace au constante indiqué plus haut
        $this->db = new PDO("mysql:host=" . self::DB_HOST . ';' . "dbname=" . self::DB_NAME . ';' . self::DB_CHARSET, self::DB_USER, self::DB_PASS);
        // On affiche les erreurs Sql
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->db;
    }

    protected function createQuery($sql, $parameters = null) {
        if($parameters)
        {
            // On effectue un traitement PDO à partir du sql
            $request = $this->checkDbConnect()->prepare($sql);

            // Si on a des paramètres Sql ils seront traités ici
            $request->execute($parameters);

            return $request;
        }
        // Si nous n'avons pas de paramètre SQL on effectue juste un query classique
        $request = $this->checkDbConnect()->query($sql);

        return $request;
    }

}
