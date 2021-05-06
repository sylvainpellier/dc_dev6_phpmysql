<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
<h1>Humains</h1>
        <!-- Masthead Subheading-->
    </div>
</header>
<?php

    if(isset($_POST["name"], $_POST["surname"])) {
        $toto = new Humain($_POST["name"],$_POST["surname"]);
        $resultat = $toto->insert();
        if($resultat)
        {
            echo'<p class="alert alert-success">insert ok</p>';
        } else
        {
            echo'<p class="alert alert-danger">insert nok</p>';
        }
    }
?>
<div class="container"><div class="row">

        <h3>Ajouter un humain :</h3>
<form method="POST">
    <input type="text" placeholder="name" name="name" />
    <input type="text" placeholder="surname" name="surname" />
    <input type="submit" value="ok" />
</form>

<hr />

<table class="table mt-5" >
    <tr><th>Nom</th><th>Surname</th><th>Actions</th></tr>

    <?php

    $gestionHumains = new GestionHumains();
    $listeHumains = $gestionHumains->loadAll();

    foreach($listeHumains as $humain)
    {
        echo"<tr>";
        echo "<td>".$humain->getName()."</td>";
        echo "<td>".$humain->getFullName()."</td>";
        echo"<td><a href='index.php?page=modifierHumain&id=".$humain->getId()."'>modifier</a> -
                <a href='index.php?page=supprimerHumain&id=".$humain->getId()."'>supprimer</a></td>";
        echo"</tr>";
    }

?>

</table>
    </div></div>