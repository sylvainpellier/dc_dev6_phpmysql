<?php

/////// ECRIRE VOTRE CLASSE ICI






////////////////////////////////

Personnage::$vieMax = 200; //Un personnage ne peut pas avoir plus de 200 points de vie

$armes = [];
$armes[] = new Arme("machette",2); //chaque arme à un nom et un facteur multipliant la force du personnage
$armes[] = new Arme("taille crayon",1);
$armes[] = new Arme("bombe nucléaire",10);

$personnageA = new Gobelin(); //à chaque fois qu'un gobelin frappe il permet lui même 5 points de vie
$personnageA->setVie(100);
$personnageA->setForce(20);

$personnageB = new Magicien(); //à chaque fois qu'un magicien est frappé il perd un de force
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