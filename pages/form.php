<?php

if(isset($_POST["titre"],$_POST["content"]) && !empty($_POST["titre"]) && !empty($_POST["content"]))
{
    $sql = "INSERT INTO codes(title,content) VALUES(:t,:c)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam("t", $_POST["titre"]);
    $stmt->bindParam("c",$_POST["content"]);
    $resultat = $stmt->execute();

    if($resultat){
        echo"<p>Félicitation code ajouté avec succès</p>";
    } else{
        echo"<p>Une erreur s'est produite</p>";
    }
}

?>
<h1>Espace membre</h1>

<form method="post"  >
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" />
    <textarea style="width: 100%; height: 200px;" placeholder="Contenu du code à saisir" name="content" id="content"></textarea>
    <input type="submit" value="Ajouter ce contenu" />
</form>

