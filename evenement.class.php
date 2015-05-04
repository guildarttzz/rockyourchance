<?php

class Evenement{


    private $date_event;
    private $nom_grp;
    private $id_event;


    public function __construct($id_event = 0){
        $id_event = (int)$id_event;

       if ($id_event > 0) {
        var_dump($id_event);
            $this->setIdEvent($id_event);
            $req = " SELECT * FROM evenement WHERE id_event = $id_event ";
            foreach (Database::_query($req) as $a) {
                $this->id_event = $a['id_event'];
                $this->nom_grp = $a['nom_grp'];
                $this->date = $a['date_event'];            
            } 
        } else {
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
        return Database::_exec($req);

        $this->nom_grp = $res;
    }


    public function insert(){
         $req = "INSERT INTO evenement(nom_grp,date_event) VALUES('".$this->nom_grp."',NOW())";
        return Database::_exec($req);
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



    static public function _getEvent(){
        $r=array();
        $req = "SELECT * FROM evenement ORDER BY date_event DESC";
        foreach (Database::_query($req) as $a) 
        {
            $r[] = $a;
        }

        return $r;
  
    }

   public function _getOneEvent(){
    echo "bauifbiabfiabzfabf";
        $req = "SELECT * 
                FROM evenement
                WHERE id_event = '".$this->id_event."'";

        return Database::_exec($req);

    }
    final public function updateEvenement() {
        $req = "UPDATE evenement
            SET  nom_grp = '" . $this->getNomGrp() . "'
                , date_event = NOW()
            WHERE id_event = '" . $this->getIdEvent() . "'
        ";

        $res = Database::_exec($req);
        return $this;
    }
}