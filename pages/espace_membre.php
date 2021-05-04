<?php

if(isset($_GET["login"]))
{
    echo"<p>La connexion s'est bien passée</p>";

    include("form.php");
}
if( !isset($_SESSION["isConnected"]) )
{
    echo"<h2>Vous n'est pas connecté</h2>";
}
echo"<h1>Bienvenue dans l'espace membre</h1>";



?>