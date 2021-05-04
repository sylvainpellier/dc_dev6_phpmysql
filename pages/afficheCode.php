<?php


if(isset($_POST["titre"],$_POST["content"]) && !empty($_POST["titre"]) && !empty($_POST["content"]))
{
    $sql = "UPDATE codes SET title = :t, content = :c WHERE id = :id ";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam("t", $_POST["titre"]);
    $stmt->bindParam("c",$_POST["content"]);
    $stmt->bindParam("id",$_GET["id"]);
    $resultat = $stmt->execute();

    if($resultat){
        echo"<p>Modification ok</p>";
    } else{
        echo"<p>Une erreur s'est produite</p>";
    }
}



$sql = "SELECT * FROM codes WHERE id = :i";
$stmt = $dbh->prepare($sql);
$stmt->bindParam("i",$_GET["id"]);
$stmt->execute();
$code = $stmt->fetch();

if(!$code)
{
    echo"<p>Ce code n'existe pas</p>";
} else {

    echo "<h1>{$code['title']}</h1>";

    echo "<pre><code style='font-size:20px;'>{$code["content"]}</pre></code>";

    echo'
<form method="post"  >
    <label for="titre">Modifier le contenu</label>
    <input type="text" name="titre" id="titre" value="'.$code["title"].'" />
    <textarea style="width: 100%; height: 200px;" placeholder="Contenu du code à saisir" name="content" id="content">'.$code["content"].'</textarea>
    <input type="submit" value="Ajouter ce contenu" />
</form>
';

   echo'<a href="index.php?supp='.$code["id"].'">supprimer</a>';


    echo "<hr />";

    echo "<h3 style='margin-top:100px'>Tous les autres codes</h3>";

    $sql = "SELECT * FROM codes WHERE id != :i";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam("i", $_GET["id"]);
    $stmt->execute();
    $codes = $stmt->fetchAll();

    foreach ($codes as $code) {
        echo "<div class='code'>";
        echo "<h2>#{$code["id"]} <a href='index.php?page=afficheCode&id=" . $code["id"] . "'>" . $code["title"] . "</a></h2>";
        echo "</div>";

    }

}