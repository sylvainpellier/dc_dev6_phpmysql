<h1>Login</h1>

<?php

   if( isset($_GET["erreur"]) )
   {
       switch($_GET["erreur"])
       {
           case "1" : echo"<p>Erreur pseudo</p>"; break;
           case "2" : echo"<p>Erreur password</p>"; break;
           case "3" : echo"<p>Erreur connexion</p>"; break;
       }
   }

    if(isset($_SESSION["isConnected"]))
    {
        echo"<p>Bienvenue ".$_SESSION["nameUser"]." vous êtes connecté</p>";
        include("espace_membre.php");
    } else {
        ?>

        <form action="action/doLogin.php" method="POST">

            <label>Pseudo</label>
            <input type="text" name="pseudo"/>

            <label>Mot de passe</label>
            <input type="password" name="password">

            <input type="submit" value="Se connecter"/>
        </form>

        <?php

    } ?>