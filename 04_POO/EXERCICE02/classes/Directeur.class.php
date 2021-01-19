<?php
class Directeur extends Employe
{
    public function calculerPrime() {
        $annualBonus = $this->getSalaire() * (7/100);
        $seniorityBonus = $this->getSalaire() * (3/100) * $this->getAnciennete();
        $bonusTotal = $annualBonus + $seniorityBonus;
        return $bonusTotal;
    }
}

