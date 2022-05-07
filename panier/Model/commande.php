<?php
class commande{
    protected $num;

    protected $nom;
    
    protected $prenom;
    
    protected $telephon;

    protected $email;

    protected $adress;
    
    protected $region;
    
    protected $ville;


    public function __construct($num,$nom , $prenom , $telephon , $email , $adress , $region , $ville)
    {
        $this->num = $num;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephon = $telephon;
        $this->email = $email;
        $this->adress = $adress;
        $this->region = $region;
        $this->ville = $ville;
    }

    

    public function getnum()
    {
        return $this->num;
    }
    public function setnum($num)
    {
        $this->num = $num;

        return $this;
    }

    


    public function getnom()
    {
        return $this->nom;
    }
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    


    public function getprenom()
    {
        return $this->prenom;
    }
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    

    public function gettelephon()
    {
        return $this->telephon;
    }
    public function settelephon($telephon)
    {
        $this->telephon = $telephon;

        return $this;
    }




    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }




    public function getadress()
    {
        return $this->adress;
    }
    public function setadress($adress)
    {
        $this->adress = $adress;

        return $this;
    }




    public function getregion()
    {
        return $this->region;
    }
    public function setregion($region)
    {
        $this->region = $region;

        return $this;
    }




    public function getville()
    {
        return $this->ville;
    }
    public function setville($ville)
    {
        $this->ville = $ville;

        return $this;
    }
    
  

}
?>