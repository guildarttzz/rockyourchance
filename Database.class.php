<?php

/**
 * Fichier Database.class.php
 *
 * PHP version 5
 *
 * @category Database
 * @package Ebrid
 * @author Curtis Pelissier <curtis.pelissier@laposte.net>
 * @license http://opensource.org/licenses/MIT
 * @link http://ebrid.lignusdev.com
 * @since Version 0.1
 */

/**
 * La classe Database permet d'effectuer des
 * requetes SQL aisément
 *
 * @author Curtis Pelissier <curtis.pelissier@laposte.net>
 */
class Database extends PDO
{
    static private $db;
    static private $last; //La dernière requete effectuée
    static private $prep;

    static private $user     = 'root';
    static private $password = '';
    static private $name     = 'rock';
    static private $host     = 'localhost';

    /**
     * Constructeur
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     */
    public function __construct()
    {
        if( (isset($_SERVER['SERVER_ADMIN']) && $_SERVER['SERVER_ADMIN'] == 'admin@localhost.com') ){
            self::$user = 'root';
            self::$password = '';
            self::$name = 'rock';
            self::$host = '127.0.0.1';
        }
        
        $dsn = 'mysql:dbname='.self::$name.';host='.self::$host;

        try{
            self::$db = parent::__construct($dsn, self::$user, self::$password);
        } catch (PDOException $e) {
            echo 'Connexion echouée : ' . $e->getMessage();
        }
    }

    /**
     * Initialise la classe Database
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return bool
     */
    static public function _init(){
        self::$db = new Database();
        return true;
    }
    
    /**
     * Fonction qui prepare une requete
     *
     * Exemple:
     * $sql = "SELECT * FROM user";
     * $result = Database::_query($sql);
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param string $sql la requete SQL
     * @return mixed
     */
    static public function _prepare($sql = "") {
        self::$prep = self::$db->prepare($sql);
        return self::$prep;
    }

    /**
     * Fonction qui fait une requete donnée et 
     * retourne le résultat.
     * On doit inserer la requete SQL dans la
     * fonction en temps que paramètre.
     *
     * Exemple: 
     * $sql = "SELECT * FROM user";
     * $result = Database::_query($sql);
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param string $req la requete SQL
     * @return mixed
     */
    static public function _query($sql = ""){
        self::$last = self::$db->query($sql);
        return self::$last;
    }

    /**
     * Fonction qui fait une requete donnée et 
     * retourne le résultat. Ce dernier sera
     * unique, d'où l'interet de la fonction.
     * On doit inserer la requete SQL dans la
     * fonction en temps que paramètre.
     *
     * Exemple: 
     * $sql = "SELECT count(1) FROM user";
     * $result = Database::_query($sql);
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param string $req la requete SQL
     * @return mixed
     */
    static public function _selectOne($sql = array()){
        if(is_array($sql) && count($sql) == 0){
            self::$last = self::$prep->execute();
            self::$last = self::$prep->fetchAll();
        }else if( is_array($sql) ){
            self::$last = self::$prep->execute($array);
            self::$last = self::$prep->fetchAll();
        }else{
            self::$last = self::$db->query($sql);
        }

        foreach (self::$last as $k => $v) {
            foreach ($v as $kk => $vv) {
                return $vv;
            }
        }
    }

    /**
     * Fonction qui récupère l'id de la dernière
     * insertion en DB.
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return int
     */
    static public function _lastInsertId(){
        return self::$db->lastInsertId();
    }

    /**
     * Fonction qui récupère le nombre de lignes
     * ramenées par la dernière requête.
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return int
     */
    static public function _rowCount(){
        return self::$last->rowCount();
    }

    /**
     * Exec function, permet d'executer une requete
     *
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param string $sql la requete sql
     * @return int
     */
    static public function _exec($sql){
        self::$last = self::$db->exec($sql);
        return self::$last;
    }
    
    /**
     * Execure function, permet d'executer une requete
     *
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param array $array les parametres
     * @return int
     */
    static public function _bindParam($key, &$val, $type){
        self::$prep->bindParam($key, $val, $type);
    }
    
    /**
     * Execute function, permet d'executer une requete
     *
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @param array $array les parametres
     * @return int
     */
    static public function _execute($array = array()) {
        if(empty($array) || count($array) == 0){
            self::$last = self::$prep->execute();
        }else{
            self::$last = self::$prep->execute($array);            
        }

        if(self::$last === false){
            self::$error = self::$prep->errorInfo();
        }

        self::$last = self::$prep->fetchAll();

        return self::$last;
    }

    /**
     * BeginTransaction
     * @see http://php.net/manual/fr/pdo.begintransaction.php
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return bool
     */
    static public function _beginTransaction(){
        return self::$db->beginTransaction();
    }

    /**
     * Commit
     * @see http://php.net/manual/fr/pdo.commit.php
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return bool
     */
    static public function _commit(){
        return self::$db->commit();
    }

    /**
     * RollBack
     * @see http://php.net/manual/fr/pdo.rollback.php
     *
     * @author Curtis Pelissier <curtis.pelissier@laposte.net>
     *
     * @return bool
     */
    static public function _rollBack(){
        return self::$db->rollBack();
    }
}