<?php

class Agence  
{

    private $_nom;
    private $_adresse;
    private $_codePostal;
    private $_ville;
    private $_modeRestauration;

    // Get et Set

    // Nom de l'agence :
    public function getNom() 
    {
        return $this->_nom;
    }
    public function setNom($nom) 
    {
        return $this->_nom= $nom;
    }

    // Adresse de l'agence :
    public function getAdresse() 
    {
        return $this->_adresse;
    }
    public function setAdresse($adresse) 
    {
        return $this->_adresse = $adresse;
    }

    // Code Postal de l'agence :
    public function getCodePostal() 
    {
        return $this->_codePostal;
    }
    public function setCodePostal($codePostal) 
    {
        return $this->_codePostal = $codePostal;
    }

    // Ville où se situe l'agence :
    public function getVille() 
    {
        return $this->_ville;
    }
    public function setVille($ville) 
    {
        return $this->_ville = $ville;
    }

    // Modalité de restauration:
    public function getModeRestauration() 
    {
        return $this->_modeRestauration;
    }
    public function setModeRestauration($modeRestauration) 
    {
        return $this->_modeRestauration = $modeRestauration;
    }

}

?>
