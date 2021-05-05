<?php

session_start();

include "../conf/loader.inc.php";

if(isset($_POST["pseudo"]) && isset($_POST["password"]))
{
    //l'utilisateur a validé le formulaire
    if(empty($_POST["pseudo"]))
    {
        header("Location: /dev6/index.php?page=login&erreur=1");
    } else if(empty($_POST["password"]))
    {
        header("Location: /index.php?page=login&erreur=2");
    } else
    {//l'utilisateur a validé le formulaire et a saisi toutes les données
        if( $_POST["pseudo"] === "titi" && $_POST["password"] === "titi")
        {   //je suis connecté
            $_SESSION["isConnected"] = true;
            $_SESSION["nameUser"] = $_POST["pseudo"];
            header("Location: /dev6/index.php?page=espace_membre&login=1");
        } else
        {
            header("Location: /dev6/index.php?page=login&erreur=3");
        }
    }
}