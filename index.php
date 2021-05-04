<?php
session_start();

$host = '127.0.0.1';
$dbname = 'dev6';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $host.";port=8889", $user, $password);
} catch (PDOException $e) {
    die('Connexion échouée : ' . $e->getMessage());
}

if(isset($_GET["logout"]))
{
    session_destroy();
}


if(isset($_GET["supp"]))
{
    $sql = "DELETE FROM codes WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam("id",$_GET["supp"]);
    $resultat = $stmt->execute();
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link href="style.css" type="stylesheet" />
        <style>

            body { background:silver; font-family: Adelle }

            header { background: white; margin:0px; padding:10px; text-align: center;  }

            header  ul { display: flex; flex:1; padding:0px; }
            header  ul li { flex:auto; list-style: none;
                text-transform: uppercase; }

            footer {
                position: fixed; bottom:0px; left:0px; right:0px; background: white;
                text-align:center; }

            .code:first-of-type { border-top: 2px solid black; }

            .code { border-bottom: 2px solid black; }

        </style>
    </head>
    <body>


    <header>
    <h1>Titre de mon site</h1>

    <ul>
        <li><a href="index.php?page=accueil">accueil</a></li>
        <li><a href="index.php?page=contact">contact</a></li>

        <?php
        if(isset($_SESSION["isConnected"]))
        {
            echo'<li><a href="index.php?page=espace_membre">espace membre</a></li>';
            echo'<li><a href="index.php?page=form">ajouter</a></li>';
            echo'<li><a href="?logout">se déconnecter</a></li>';

        } else
        {
            echo'<li><a href="index.php?page=login">login</a></li>';
        }
        ?>

    </ul>

    </header>

    <?php






        if(isset($_GET["page"]) && file_exists("pages/".$_GET["page"].".php") )
        {
            include("pages/".$_GET["page"].".php");

        } else
        {
            include("pages/accueil.php");

        }



    ?>

    <footer>

        <?php

        if(isset($_SESSION["nbPageVue"]))
        {
            //$_SESSION["nbPageVue"] = $_SESSION["nbPageVue"]+ 1;
            $_SESSION["nbPageVue"]++;
        } else
        {
            $_SESSION["nbPageVue"] = 1;
        }

        echo"<p>Nombre de page vue : ".$_SESSION["nbPageVue"]."</p>";


        if(isset($_COOKIE["dernierePage"]))
        {
            echo"<p>La dernière page vue est : ".$_COOKIE["dernierePage"]."</p>";
        }

        ?>

    </footer>


    </body>

</html>