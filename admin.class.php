<?php
class Administrateur
{
    private $_id_admin;
    private $_adresse;
    private $_numtel;
    private $_email;
    private $_comptefb;
    private $_password;
    private $_pseudo;
    
    public function __construct($id_admin = 0)
    {
        if(self::exist($id_admin)) {
            if (is_numeric($id_admin)) {
                $req = "SELECT * FROM administrateur WHERE id_admin = '$id_admin'";
            }else {
                $req = "SELECT * FROM administrateur WHERE pseudo = '$id_admin'";            
            }
            $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . FILE . ' à la ligne ' . LINE . ' avec la requete : ' . $req);
            while($a = mysqli_fetch_assoc($res)){
                $this->_id_admin = $a['id_admin'];
                $this->_adresse = $a['adresse'];
                $this->_numtel = $a['numtel'];
                $this->_comptefb = $a['comptefb'];
                $this->_password = $a['password'];
                $this->_pseudo = $a['pseudo'];
            }
        }else {
            $this->_adresse = 0;
            $this->_numtel = 0;
            $this->_comptefb = 0;
            $this->_password = 0;
            $this->_pseudo = 0;
        }
    }
    public function getEmail()
    {
        return $this->_email;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function getIdAdmin()
    {
        return $this->_id_admin;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function getNumTel()
    {
        return $this->numtel;
    }

    public function getCompteFb()
    {
        return $this->_comptefb;
    }

    public function setEmail($email)
    {
        if (!preg_match("#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,4}$#", $email)) 
        {
            return false;
        }
        $this->_email = $email;
        return true;
    }

    public function setPseudo($pseudo) 
    {
        if (!preg_match("#^[\w\.\#\-\s]{5,}$#", $pseudo)) 
        {
            return false;
        }
        $this->_pseudo = $pseudo;
        return true;
    }

    public function setPassword($password)
    {
        if (!preg_match("#^[\w\.\#\-\s]{6,}$#", $password)) 
        {
            return false;
        }   
        $this->_password = $password;
        return true;
    }

    public function setIdAdmin($id_admin)
    {
        $this->_id_admin = $id_admin;
    }

    public function setAdresse($adresse){
        if (!preg_match("#^[\w\s\d\-]{30,}$#", $adresse)){
            
            return false;
        }

        $this->_adresse = $adresse;
        return true;
    }

    public function setNumTel($numtel){
        if(!preg_match("#^[\d\.]{14}$#", $numtel)){
            return false;
        }
        $this->_numtel = $numtel;
        return true;
    }

    public function setCompteFb($comptefb){
        $this->_comptefb = $comptefb;
        return true;
    }
    public function insert()
    {
        $req = "INSERT INTO administrateur(adresse, numtel, email, comptefb,password,pseudo) 
        VALUES('".$this->_adresse."','".$this->_numtel."','".$this->_email."',
            '".$this->_comptefb."', '" . md5($this->_password) . "','".$this->_pseudo."')";
        $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
        if(!$res) return false;
        $this->_id = mysqli_insert_id();
        return true;
    }

    public function checkPassword($password)
    {
        if (md5($password) != $this->_password) {
            return false;
        }
        return true;
    }

    /*public function isAdmin()
    {
        if($this->_admin != 1) {
            return false;
        } 
        return true;
    }*/

   static public function exist($u = null) 
    {
        if (!is_null($u)) 
        {
            if (is_numeric($u)) $where = "id_admin = '" . intval($u) . "'";
            else if (is_string($u)) $where = "pseudo = '$u'";
            else return false;
            
            $req = "SELECT id_admin FROM administrateur WHERE " . $where;
            $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
            if (mysqli_num_rows($res) > 0) return true;
            else return false;
        }
        return true;
    }
}