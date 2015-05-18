<?php

class Contact{

    private $id_contact;
    private $nom_grp;
    private $nom_membre;
    private $email;
    private $spe;
    private $site;


    public function __construct($id_contact = 0){
        $id_contact = (int)$id_contact;

       if ($id_contact > 0) {
        
            $this->setIdContact($id_contact);
            $req = " SELECT * FROM contact WHERE id_contact = $id_contact ";
            foreach (Database::_query($req) as $a) {
                $this->id_contact = $a['id_contact'];
                $this->nom_grp = $a['nom_grp'];
                $this->nom_membre = $a['nom_membre'];                
                $this->email = $a['email'];
                $this->spe = $a['spe'];
                $this->site = $a['site'];            
            }
        } else {
            $this->id_contact = 0;
            $this->nom_grp = 0;
            $this->nom_membre = 0;            
            $this->email = 0;
            $this->spe = 0;
            $this->site = 0;
        }
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
     * Gets the value of nom_membre.
     *
     * @return mixed
     */
    public function getNomMembre()
    {
        return $this->nom_membre;
    }

    /**
     * Sets the value of nom_membre.
     *
     * @param mixed $nom_membre the nom_membre
     *
     * @return self
     */
    public function setNomMembre($nom_membre)
    {
        $this->nom_membre = $nom_membre;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Gets the value of spe.
     *
     * @return mixed
     */
    public function getSpe()
    {
        return $this->spe;
    }

    /**
     * Sets the value of spe.
     *
     * @param mixed $spe the spe
     *
     * @return self
     */
    public function setSpe($spe)
    {
        $this->spe = $spe;

        return $this;
    }


    /**
     * Gets the value of site.
     *
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Sets the value of site.
     *
     * @param mixed $site the site
     *
     * @return self
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Gets the value of id_contact.
     *
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->id_contact;
    }

    /**
     * Sets the value of id_contact.
     *
     * @param mixed $id_contact the id id_contact
     *
     * @return self
     */
    public function setIdContact($id_contact)
    {
        $this->id_contact = $id_contact;

        return $this;
    }

    public function insert(){
        $req = "INSERT INTO contact(
            nom_grp,
            nom_membre,
            email,
            spe,
            site
            ) VALUES(
            '".$this->nom_grp."',
            '".$this->nom_membre."',
            '".$this->email."',
            '".$this->spe."',
            '".$this->site."')";
        return Database::_exec($req);
    }


    static public function _exist($u = null) 
    {
        if (!is_null($u)) 
        {
            if (VerifName($u)) $where = "nom_grp = '$u'";
            elseif (VerifName($u)) $where = "email = '$u'";
            elseif (VerifName($u)) $where = "site = '$u'";
            else{
                return false;
            } 
    }        


    }

    static public function _getContact(){
        $r=array();
        $req = "SELECT * FROM contact";
        foreach (Database::_query($req) as $a) 
        {
            $r[] = $a;
        }
        return $r;
      
    }
    public function _getOneContact(){
        $req = "SELECT * 
                FROM contact
                WHERE id_contact = '".$this->id_contact."'";

        return Database::_exec($req);

    }
    final public function updateContact() {
        $req = "UPDATE contact
            SET  nom_grp = '" . $this->getNomGrp() . "',
            nom_membre = '". $this->getNomMembre() ."',
            email = '" . $this->getEmail() . "', 
            spe = '" . $this->getSpe() . "',
            site = '" . $this->getSite() . "',                
            WHERE id_contact = '" . $this->getIdContact() . "'
        ";

        $res = Database::_exec($req);
        return $this;
    }

    public function deleteContact() {
        Database::_beginTransaction();
        
        $req = "DELETE FROM contact
                WHERE id_contact = '" . $this->id_contact . "'";
        $res = Database::_exec($req);
        
        if (!$res) {
            Database::_rollBack();
        } else {
            Database::_commit();
        }
    }

    static public function _deleteContact($id) {
        $a = new Contact($id);
        $a->deleteContact();
    }
}