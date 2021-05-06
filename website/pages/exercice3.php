<?php

/////// ECRIRE VOTRE CLASSE ICI



class Arme
{
    private $name;

    public function __construct(string $name, int $multiplicateur)
    {
        $this->name = $name;
        $this->multiplicateur = $multiplicateur;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getMultiplicateur()
    {
        return $this->multiplicateur;
    }


    public function setMultiplicateur($multiplicateur): void
    {
        $this->multiplicateur = $multiplicateur;
    }
    private $multiplicateur;
}

class Personnage1
{
    public static $vieMax;

    private $vie;
    private $force;
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getVie(): int
    {
        return $this->vie;
    }

    protected function estFrappe( int $force): void
    {
        $this->vie -= $force;
    }

    public function setVie(int $vie): void
    {
        if( $vie > self::$vieMax ) { $vie = self::$vieMax; }
        $this->vie = $vie;
    }

    public function getForce(): int
    {
        return $this->force;
    }

    public function setForce(int $force): void
    {
        $this->force = $force;
    }

    public function frapper(Arme $arme, Personnage1 $personnage): bool
    {
        echo"<p>". $this->name." a frappé ".$personnage->getName()." avec ".$arme->getName()."</p>";
        $personnage->estFrappe( $this->force * $arme->getMultiplicateur() );
        return ($personnage->getVie() <= 0);
    }

}


class Gobelin extends Personnage1
{
        public function frapper(Arme $arme, Personnage1 $personnage): bool
        {
            $resultat = parent::frapper($arme,$personnage);
            $this->setVie( $this->getVie() - 5);
            return $resultat;
        }
}

class Magicien extends Personnage1
{
    protected function estFrappe(int $force): void
    {
        parent::estFrappe($force);
        $this->setForce( $this->getForce() - 1);
    }
}




////////////////////////////////

Personnage::$vieMax = 200; //Un personnage ne peut pas avoir plus de 200 points de vie

$armes = [];
$armes[] = new Arme("machette",2); //chaque arme à un nom et un facteur multipliant la force du personnage
$armes[] = new Arme("taille crayon",1);
$armes[] = new Arme("bombe nucléaire",10);

$personnageA = new Gobelin("gob"); //à chaque fois qu'un gobelin frappe il permet lui même 5 points de vie
$personnageA->setVie(100);
$personnageA->setForce(20);

$personnageB = new Magicien("mag"); //à chaque fois qu'un magicien est frappé il perd un de force
$personnageB->setVie(4420);
$personnageB->setForce(10);

$personnageVictoire = false;
while(!$personnageVictoire) {


    $isVictoire = $personnageA->frapper($armes[ random_int(0,count($armes)-1) ], $personnageB);
    if ($isVictoire)
    {
        $personnageVictoire = "A";
    } else
    {
        $isVictoire = $personnageB->frapper($armes[ random_int(0,count($armes)-1) ],$personnageA);
        if ($isVictoire)
        {
            $personnageVictoire = "B";
        }
    }
}
echo "Le personnage $personnageVictoire a gagné ";