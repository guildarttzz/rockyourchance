<?php
class Utilisateur
{
    private $_pseudo;
    private $_email;
    private $_password;
    private $_id;
    private $_admin;
    
    public function __construct($id = 0)
    {
        if(self::exist($id)) {
            if (verifInt($id)) {
                $req = "SELECT * FROM admin WHERE id = '$id'";
            }else {
                $req = "SELECT * FROM admin WHERE pseudo = '$id'";            
            }
            $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
            while($a = mysqli_fetch_assoc($res)){
                $this->_id = $a['id'];
                $this->_email = $a['email'];
                $this->_pseudo = $a['pseudo'];
                $this->_password = $a['password'];
                $this->_admin = $a['admin'];
            }
        }else {
            $this->_email = 0;
            $this->_pseudo = 0;
            $this->_password = 0;
            $this->_id = 0;
            $this->_admin = 0;
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

    public function getId()
    {
        return $this->_id;
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

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function insert()
    {
        $req = "INSERT INTO admin(pseudo, email, password) VALUES('".$this->_pseudo."', '".$this->_email."', '" . md5($this->_password) . "')";
        $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
        if(!$res) return false;
        $this->_id = mysqli_insert_id($db);
        return true;
    }

    public function checkPassword($password)
    {
        if (md5($password) != $this->_password) {
            return false;
        }
        return true;
    }

    public function isAdmin()
    {
        if($this->_admin != 1) {
            return false;
        } 
        return true;
    }

    static public function exist($u = null) 
    {

        if (!is_null($u)) 
        {
            if (verifMail($u)) 
                {

                    $where = "email = '$u'";
                }
            else if (verifInt($u)) $where = "id = '" . intval($u) . "'";
            else if (verifName($u)) $where = "pseudo = '$u'";
            else return false;
            
            $req = "SELECT id FROM admin WHERE " . $where;
            $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
            if (mysqli_num_rows($res) > 0) return true;
            else return false;
        }
        return false;
    }
}