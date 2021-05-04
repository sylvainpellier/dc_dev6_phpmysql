<h1>Accueil</h1>

<p>Bienvenue ....</p>

<?php

setcookie("dernierePage","accueil",time()+10);

$sql = "SELECT id,title, content FROM codes  ";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$tableauDonnees = $stmt->fetchAll(PDO::FETCH_ASSOC);


if( count($tableauDonnees) === 0)
{
    echo"<p>Aucune donnée à afficher</p>";
} else
{
    foreach ($tableauDonnees as $code)
    {
        echo"<div class='code'>";
        echo"<h2>#{$code["id"]} <a href='index.php?page=afficheCode&id=".$code["id"]."'>".$code["title"]."</a></h2>";
        echo"</div>";
    }

}


?>