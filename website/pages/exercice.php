<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <h1>Humains</h1>
        <!-- Masthead Subheading-->
    </div>
</header>

<?php

/////// ECRIRE VOTRE CLASSE ICI

class Personnage
{
    private $vie;
    private $force;

    public function getVie(): int
    {
        return $this->vie;
    }

    public function setVie(int $vie): void
    {
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

    public function frapper(Personnage $personnage): bool
    {
        $personnage->setVie(  $personnage->getVie() - $this->force );
        return ($personnage->getVie() <= 0);
    }

}

////////////////////////////////

$personnageA = new Personnage();
$personnageA->setVie(100);
$personnageA->setForce(20);

$personnageB = new Personnage();
$personnageB->setVie(120);
$personnageB->setForce(10);

$personnageVictoire = false;
while(!$personnageVictoire) {

    $victimeIsDead = $personnageA->frapper($personnageB);
    if ($victimeIsDead)
    {
        $personnageVictoire = "A";
    } else
    {
        $victimeIsDead = $personnageB->frapper($personnageA);
        if ($victimeIsDead)
        {
            $personnageVictoire = "B";
        }
    }
}
echo "Le personnage $personnageVictoire a gagné ";