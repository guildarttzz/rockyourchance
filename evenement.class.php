<?php

class Evenement{


    private $date_event;
    private $nom_grp;
    private $id_event;


    public function __construct($id_event = 0){


       if ($id_event > 0) {
            $this->setIdEvent($id_event);
            $req = " SELECT * FROM evenement WHERE id_event = $id_event ";
            $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
            while($a = mysqli_fetch_assoc($res)){
                $this->id = $a['id_event'];
                $this->nom_grp = $a['nom_grp'];
                $this->date = $a['date_event'];            }
        } else
        {
            $this->id_event = 0;
            $this->nom_grp = 0;
            $this->date_event = 0;
        }
    
    }


    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDateEvent()
    {
        return $this->date_event;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    public function setDateEvent($date_event)
    {
        $this->date_event = $date_event;

        return $this;
    }

    /**
     * Gets the value of nom_grp.
     *
     * @return mixed
     */
    public function getNomGrp()
    {
        return $this->nom_grp;
    }

    /**
     * Sets the value of nom_grp.
     *
     * @param mixed $nom_grp the nom grp
     *
     * @return self
     */
    public function setNomGrp($nom_grp)
    {
        $this->nom_grp = $nom_grp;

        return $this;
    }

    /**
     * Gets the value of id_event.
     *
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->id_event;
    }

    /**
     * Sets the value of id_event.
     *
     * @param mixed $id_event the id event
     *
     * @return self
     */
    public function setIdEvent($id_event)
    {
        $this->id_event = $id_event;

        return $this;
    }

    public function jointure(){
       $req = "SELECT nom_grp g
                FROM evenement e, grp g
                WHERE e.nom_grp = g.nom_grp
               ";
        $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
        if(!$res) return false;

        $this->nom_grp = $res;
    }


    public function insert(){
         $req = "INSERT INTO evenement(nom_grp,date_event) VALUES('".$this->nom_grp."',NOW())";
        $res = mysqli_query($GLOBALS['db'], $req) or die(mysql_error() . '<br />Erreur dans le fichier ' . __FILE__ . ' à la ligne ' . __LINE__ . ' avec la requete : ' . $req);
        if(!$res) return false;
    }


    static public function _exist($u = null) 
    {
        if (!is_null($u)) 
        {
            if (VerifName($u)) $where = "nom_grp = '$u'";
            else{
                return false;
            } 
    }        


    }
}