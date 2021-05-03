<?php

if(isset($_GET["login"]))
{
    echo"<p>La connexion s'est bien passée</p>";
}
if( !isset($_SESSION["isConnected"]) )
{
    echo"<h2>Vous n'est pas connecté</h2>";
} else
{
?>
<h1>Espace membre</h1>

<a href="?logout">se déconnecter</a>

<?php } ?>