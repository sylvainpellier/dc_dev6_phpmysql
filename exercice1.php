<?php

$personne1 = [];
$personne1["nom"] = "Toto";
$personne1["age"] = 10;
$personne1["present"] = true;

$personne2 = [];
$personne2["nom"] = "Titi";
$personne2["age"] = 30;
$personne2["present"] = true;

$personne3 = [];
$personne3["nom"] = "Tutu";
$personne3["age"] = 20;
$personne3["present"] = false;

$personne4 = [];
$personne4["nom"] = "Tyty";
$personne4["age"] = 10;
$personne4["present"] = true;

$eleves = [$personne1,$personne2,$personne3,$personne4];

$a = "bbbb";
$b = "<div class=\"test\">{$a}</div>";
$c = "Aujourd'hui";


////////////////////////////////////////////////////////
///
/// étape1 : afficher la liste des noms d'élèves <p>Liste des élèves : </p><ul><li>Toto</li><li>Titi</li><li>Tutu</li></ul>
/// étape2 : afficher la liste des noms d'élèves majeurs <p>Liste des élèves majeurs : </p><ul><li>Titi</li><li>Tutu</li></ul>
/// étape3 : afficher la liste des noms d'élèves majeurs et présents <p>Liste des élèves majeurs et présents : </p><ul><li>Titi</li></ul>
///

echo"<ul>";
foreach ($eleves as $eleve)
{
   if($eleve["age"] > 18 && $eleve["present"])
   {
       echo"<li>".$eleve["nom"]."</li>";
   }
}
echo"</ul>";

/// étape4 : afficher la moyenne d'âge des élèves : <p>La moyenne d'âge des élèves est de 20 ans</p>

if(count($eleves) > 0)
{
    $sommeAge= 0;
    foreach($eleves as $eleve)
    {
        $sommeAge += $eleve["age"];
    }

    //$sommeAge = array_reduce($eleves,function($somme,$eleve){ return $somme + $eleve["age"]; });

    $moyenne = $sommeAge / count($eleves);
    echo"La moyenne d'âge est {$moyenne}";

}

/// étape5 : afficher l'âge de l'élève le plus jeune :  <p>L'age de l'élève le plus jeune est 10 ans</p>

$min = false;
foreach ($eleves as $eleve)
{
    if(!$min || $eleve["age"] < $min)
    {
        $min = $eleve["age"];
    }
}

if($min) {
    echo "âge de l'élève le plus jeune est " . $min;
}

/// étape6 : afficher le nom de l'élève le plus jeune :  <p>Toto est le plus jeune</p>
///

$min = false;
$eleveLePlusJeune = false;
$eleveNom = "";
foreach ($eleves as $eleve)
{
    if(!$min || $eleve["age"] < $min)
    {
        $eleveNom = $eleve["nom"];
        $min = $eleve["age"];
        $eleveLePlusJeune = $eleve;
    }
}

echo $eleveNom;

if($eleveLePlusJeune) {
    echo "élève le plus jeune est " . $eleveLePlusJeune["nom"] . " et a " . $eleveLePlusJeune["age"] . " ans";
}

/// étape7 : afficher l'âge de l'élève le plus vieux :  <p>L'age de l'élève le plus vieux est 30 ans</p>
/// étape8 : afficher le nom de l'élève le plus vieux :  <p>Toto est le plus vieux</p>
/// étape9 : afficher les nom d'élèves qui finissent par un i</p>
/// étape10 : afficher les nom d'élèves qui sont plus vieux que la moyenne</p>
/// étape11 : afficher les nom d'élèves qui sont les plus jeunes</p>
///
///


?>

