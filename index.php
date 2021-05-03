<?php
session_start();

if(isset($_GET["logout"]))
{
    session_destroy();
}

?>

<html>
<head>

</head>
<body>

<h1>Titre de mon site</h1>

<ul>
    <li><a href="index.php?page=accueil">accueil</a></li>
    <li><a href="index.php?page=contact">contact</a></li>
    <li><a href="index.php?page=login">login</a></li>

</ul>

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

    //setcookie("dernierePage","contact",time()+10);

    if(isset($_COOKIE["dernierePage"]))
    {
        echo"<p>La dernière page vue est : ".$_COOKIE["dernierePage"]."</p>";
    }



    if(isset($_GET["page"]) && file_exists("pages/".$_GET["page"].".php") )
    {
        include("pages/".$_GET["page"].".php");

    } else
    {
        include("pages/accueil.php");

    }

?>

</body>

<html>