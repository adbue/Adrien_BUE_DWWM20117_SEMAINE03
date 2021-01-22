<?php

setlocale(LC_TIME, "fr_FR");
/*
*
*   SOMMAIRE
*   
*   ligne  à  : VARIABLES
*   Ligne  à  : GETTER / SETTER
*   Ligne  à  : MÉTHODES
*   Ligne  : FIN CLASSE
*
*/



class Employe
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

    public function __construct(){
        self::$nbrEmploye =0;
    }


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
    return $this->_dateEmbauche =DateTime::createFromFormat('d/m/Y', $dateEmbauche);
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

    // Agence:


public function getAgence() 
{
    return $this->_agence;
}
public function setAgence($agence) 
{
    return $this->_agence = $agence;
}


    // Ancienneté:


    public function getAnciennete() 
{
    $today= New DateTime();
    $dateEmbauche = $this->getDateEmbauche();
    $result = $dateEmbauche->diff($today);
    return $this->anciennete = $result->format('%y');
}


    public function setAnciennete($anciennete) 
    {
        return $this->_anciennete = $anciennete;
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


// Fonction Listing



// Fonction pour savoir si un employé peut bénéficier de chèques vacances ou non :


public function isChequeVacance() 
{
    if ($this->getAnciennete() >= 1) {
        return $this->chequeVacance = true;
    } else {
        return $this->chequeVacance = false;
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

        $this->setChequeNoel($cpt);

        if($this->getChequeNoel() == 0){
            $this->setChequeNoel("Non");
            return $this->getChequeNoel();
        }

        return "Oui (Total = ".$this->getChequeNoel()."€ )";
    } 
    else 
    {
        $this->setChequeNoel("Non");
        return $this->getChequeNoel();
    }
}

// En Construction
public function getListEmploye()
{

}



// Cette fonction ne me sert qu'à vérifier mes méthodes


public function Display()
{

    print_r( 
    "Nom : ".$this->getNom()."\n".
    "Prénom : ".$this->getPrenom()."\n".
    "Agence : \n".
    "Service : ".$this->getService()."\n".
    "Fonction : ".$this->getFonction()."\n".
    "Date d'embauche : ".$this->getDateEmbauche()->format('d/m/Y')."\n".
    "Année(s) d'ancienneté : ".$this->getAnciennete()."\n".
    "Salaire annuel brut : ".$this->getSalaire()." €\n".
    "Primes annuelles : ".$this->calculerPrime()." €\n".
    "Enfants : ".$this->arrayTrans()."\n".
    "Éligibilité chèques Noël : ".$this->isChequeNoel()."\n".
    "Éligibilité chèques vacances : ".$this->isChequeVacance()."\n"
    );

}

}

/* 
$oEmploye = new Employe();
     // AGENCE
    $oEmploye->setNom("SEGECOP");
    $oEmploye->setAdresse("133, rue du port");
    $oEmploye->setCodePostal(15820);
    $oEmploye->setVille("Bougie");
    $oEmploye->setModeRestauration("Cantine");
    // EMPLOYE
    $oEmploye->setNom("Langlois");
    $oEmploye->setPrenom("Jean-Paul");
    $oEmploye->setFonction("Chef Comptable");
    $oEmploye->setService("Comptabilité");
    $oEmploye->setSalaire(42000);
    $oEmploye->setEnfant(["Camille"=>15, "Jérémy"=>11, "Florian"=>22]);
    $oEmploye->setDateEmbauche("14/05/2015");
    // $oEmploye->Display();

    $oEmploye2 = new Employe();
    // AGENCE
    $oEmploye2->setNom("AFFCA");
    $oEmploye2->setAdresse("2,avenue des Lombards");
    $oEmploye2->setCodePostal(65230);
    $oEmploye2->setVille("Chandelle");
    $oEmploye2->setModeRestauration("Extérieur");
    // EMPLOYE
    $oEmploye2->setNom("Franc");
    $oEmploye2->setPrenom("José");
    $oEmploye2->setFonction("Agent d'entretien");
    $oEmploye2->setService("Entretien");
    $oEmploye2->setSalaire(16000);
    $oEmploye2->setEnfant("Non");
    $oEmploye2->setDateEmbauche("14/05/2010");
    // $oEmploye2->Display();

    $oEmploye3 = new Employe();
    // AGENCE
    $oEmploye3->setNom("Société Dupont");
    $oEmploye3->setAdresse("21, rue du pont");
    $oEmploye3->setCodePostal(10000);
    $oEmploye3->setVille("Chandelier");
    $oEmploye3->setModeRestauration("Cantine");
    // EMPLOYE
    $oEmploye3->setNom("Groseille");
    $oEmploye3->setPrenom("Patricia");
    $oEmploye3->setFonction("Secrétaire");
    $oEmploye3->setService("Administration");
    $oEmploye3->setSalaire(22000);
    $oEmploye3->setEnfant(["Kévin"=>17, "Aristide"=>12, "Barnabé"=>7]);
    $oEmploye3->setDateEmbauche("14/09/2009");
    // $oEmploye3->Display();

    $oEmploye4 = new Employe();
    // AGENCE
    $oEmploye4->setNom("HIQQPK");
    $oEmploye4->setAdresse("26, rue des enfers");
    $oEmploye4->setCodePostal(03650);
    $oEmploye4->setVille("Hors-Léant sur Loire");
    $oEmploye4->setModeRestauration("Cantine");
    // EMPLOYE
    $oEmploye4->setNom("Vuzelet");
    $oEmploye4->setPrenom("Edmond");
    $oEmploye4->setFonction("Technicien réseau informatique");
    $oEmploye4->setService("Informatique");
    $oEmploye4->setSalaire(25200);
    $oEmploye4->setEnfant(["Camille"=>25, "Florine"=>20]);
    $oEmploye4->setDateEmbauche("14/05/2007");
    $oEmploye4->Display(); 

    $oEmploye5 = new Employe();

    // EMPLOYE
    $oEmploye5->setNom("Gecépa");
    $oEmploye5->setPrenom("Laurent");
    $oEmploye5->setFonction("Aide-Comptable");
    $oEmploye5->setService("Comptabilité");
    $oEmploye5->setSalaire(27600);
    $oEmploye5->setEnfant(["Enzo"=>2]);
    $oEmploye5->setDateEmbauche("14/10/2020");
    // $oEmploye5->Display();
    $oEmploye5->getListEmploye();
 */
?>

