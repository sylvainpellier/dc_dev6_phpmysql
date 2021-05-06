<?php

class Animal
{
    protected $nbPatte;
    protected $hasPatte;
    protected $regime;
    protected $dureeVie;
    protected $reserveEnergie;
    protected $quantiteEnergieDepenseBougeant;

    /**
     * @return mixed
     */
    public function getNbPatte()
    {
        return $this->nbPatte;
    }

    /**
     * @param mixed $nbPatte
     */
    public function setNbPatte($nbPatte): void
    {
        $this->nbPatte = $nbPatte;
    }

    /**
     * @return mixed
     */
    public function getHasPatte()
    {
        return $this->hasPatte;
    }

    /**
     * @param mixed $hasPatte
     */
    public function setHasPatte($hasPatte): void
    {
        $this->hasPatte = $hasPatte;
    }

    /**
     * @return mixed
     */
    public function getRegime()
    {
        return $this->regime;
    }

    /**
     * @param mixed $regime
     */
    public function setRegime($regime): void
    {
        $this->regime = $regime;
    }

    /**
     * @return mixed
     */
    public function getDureeVie()
    {
        return $this->dureeVie;
    }

    /**
     * @param mixed $dureeVie
     */
    public function setDureeVie($dureeVie): void
    {
        $this->dureeVie = $dureeVie;
    }

    /**
     * @return mixed
     */
    public function getReserveEnergie()
    {
        return $this->reserveEnergie;
    }

    /**
     * @param mixed $reserveEnergie
     */
    public function setReserveEnergie($reserveEnergie): void
    {
        $this->reserveEnergie = $reserveEnergie;
    }

    /**
     * @return mixed
     */
    public function getQuantiteEnergieDepenseBougeant()
    {
        return $this->quantiteEnergieDepenseBougeant;
    }

    /**
     * @param mixed $quantiteEnergieDepenseBougeant
     */
    public function setQuantiteEnergieDepenseBougeant($quantiteEnergieDepenseBougeant): void
    {
        $this->quantiteEnergieDepenseBougeant = $quantiteEnergieDepenseBougeant;
    }


    public function bouger()
    {
        $this->reserveEnergie -= $this->quantiteEnergieDepenseBougeant;
    }

    public function courir()
    {
        $this->bouge();
    }

}

class Canide extends Animal
{
        public function courir()
        {
            parent::courir();
            $this->reserveEnergie -= $this->quantiteEnergieDepenseBougeant * 4;

        }
}

class Felin extends Animal
{

}

class Chien extends Canide
{

}

$titi = new Felin();
$titi->setNbPatte(4);
$titi->courir();

$toto = new Chien();
