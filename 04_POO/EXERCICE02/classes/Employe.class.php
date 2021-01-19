<?php

/*
*
*   SOMMAIRE
*   
*   ligne 19 à 30 : VARIABLES
*   Ligne 32 à 162 : GETTER / SETTER
*   Ligne 165 à 279 : MÉTHODES
*   Ligne 282 : FIN CLASSE
*
*/


class Employe extends Agence
{
    private $_nom;
    private $_prenom;
    private $_dateEmbauche;
    private $_fonction;
    private $_salaire;
    private $_service;
    private $_agence;
    private $_chequeVacance;
    private $_enfant;
    private $_chequeNoel;
    public static $nbrEmploye;


        // ACCESSEURS ET MUTATEURS


    // Nom :


public function getNom() 
{
    return $this->_nom;
}
public function setNom($nom) 
{
    return $this->_nom = $nom;
}


    // Prénom :


public function getPrenom() 
{
    return $this->_prenom;
}
public function setPrenom($prenom) 
{
    return $this->_prenom = $prenom;
}


    // Date d'embauche :


public function getDateEmbauche() 
{
    return $this->_dateEmbauche;
}
public function setDateEmbauche($dateEmbauche) 
{
    return $this->_dateEmbauche = DateTime::createFromFormat('d/m/Y', $dateEmbauche);
}


    // Fonction au sein de l'entreprise :


public function getFonction() 
{
    return $this->_fonction;
}
public function setFonction($fonction) 
{
    return $this->_fonction = $fonction;
}


    // Salaire annuel brut :


public function getSalaire() 
{
    return $this->_salaire;
}
public function setSalaire($salaire) 
{
    return $this->_salaire = $salaire;
}


    // Service dans lequel se situe l'employé:


public function getService() 
{
    return $this->_service;
}
public function setService($service) 
{
    return $this->_service = $service;
}


    // Agence où travaille l'employé :


public function getAgence() 
{
    return $this->_agence;
}
public function setAgence($agence) 
{
    return $this->_agence = $agence;
}


    // Chèques vacances:


public function getChequeVacance() 
{
    return $this->_chequeVacance;
}
public function setChequeVacance($chequeVacance) 
{
    return $this->_chequeVacance = $chequeVacance;
}


    // enfant(s):


public function getEnfant() 
{
    return $this->_enfant;
}
public function setEnfant($enfant) 
{
    return $this->_enfant = $enfant;
}


    // Chèque(s) Noel :


public function getChequeNoel() 
{
    return $this->_chequeNoel;
}
public function setChequeNoel($chequeNoel)
{
    return $this->_chequeNoel = $chequeNoel;
}


    // MÉTHODES


// Fonction pour connaître l'ancienneté d'un employé(e) au sein de l'entreprise :


public function getAnciennete() 
{
    $today = new DateTime();
    $dateEmploye = $this->getDateEmbauche();
    $result = $dateEmploye->diff($today);
    return $result->format('%y');
}


// Fonction pour connaître le montant des deux primes:
    # Le montant de la prime annuelle est de 5% du salaire annuel brut
    # Le montant de la  prime d'ancienneté est de 2% du salaire annuel brut par année d'ancienneté


public function calculerPrime() 
{
    $annualBonus = $this->getSalaire() * (5/100);
    $seniorityBonus = $this->getSalaire() * ((2/100) * $this->getAnciennete());
    $bonusTotal = $annualBonus + $seniorityBonus;
    return $bonusTotal;
}


// Fonction pour savoir si un employé peut bénéficier de chèques vacances ou non :


public function isChequeVacance() 
{
    if ($this->getAnciennete() >= 1) {
        return $this->chequeVacance = 'Oui';
    } else {
        return $this->chequeVacance = 'Non';
    }
}


public function arrayTrans() 
{
    if(is_array($this->getEnfant()))
    {
        return count(array_keys($this->getEnfant()))." \n(".implode(array_keys($this->getEnfant()),", ")."),\n(".implode($this->getEnfant(),", ")." ans)";
    } else
    {
        return $this->getEnfant();
    }
}


public function isChequeNoel()
{
    if(is_array($this->getEnfant()))
    {
        $cpt =0;

        foreach ($this->getEnfant() as $key => &$value) 
        {
            if($value<=10)
            {
                $cpt+=20;
            }
            if($value>=11 && $value <=15)
            {
                $cpt+=30;
            }
            if($value>=16 && $value <=18)
            {
                $cpt+=50;
            }
            if($value>=19)
            {
                $cpt+=0;
            }
        }

        if($cpt == 0)
        {
            $cpt = "Non";
        }
        $this->setChequeNoel($cpt);

        return 'Oui (Total = '.$this->getChequeNoel().'€ )';
    } 
    else 
    {
        return $this->getChequeNoel("Non");
    }
}


public function Display()
{

    print_r( 
    "Nom : ".$this->getNom()."\n".
    "Prénom : ".$this->getPrenom()."\n".
    "Agence : "."\n".
    "Service : ".$this->getService()."\n".
    "Fonction : ".$this->getFonction()."\n".
    "Date d'embauche : ".$this->getDateEmbauche()->format('d/m/Y')."\n".
    "Année(s) d'ancienneté : ".$this->getAnciennete()."\n".
    "Salaire annuel brut : ".$this->getSalaire()." €\n".
    "Primes annuels : ".$this->calculerPrime()." €\n".
    "Enfants : ".$this->arrayTrans()."\n".
    "Éligibilité chèques Noël : ".$this->isChequeNoel()."\n".
    "Éligibilité chèques vacances : ".$this->isChequeVacance()."\n"
    );

}

}
$oEmploye = new Employe();
    $oEmploye->setNom("Langlois");
    $oEmploye->setPrenom("Jean-Paul");

    $oEmploye->setFonction("Chef Comptable");
    $oEmploye->setService("Comptabilité");
    $oEmploye->setSalaire(30000);
    $oEmploye->setEnfant(["Camille"=>15, "Jérémy"=>11, "Florian"=>22]);
    $oEmploye->setDateEmbauche("14/05/2015");
    $oEmploye->Display();
?>

