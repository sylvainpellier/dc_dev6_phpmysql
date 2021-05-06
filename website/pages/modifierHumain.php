<?php

if(isset($_GET["id"]))
{
    $humain = new Humain();
    $humain->load((int)$_GET["id"]);

}

?>

<!-- Masthead-->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <h1><?= $humain->getName(); ?></h1>
        <!-- Masthead Subheading-->
    </div>
</header>


<?php

if(isset($_GET["id"]))
{
    if(isset($_POST["update"]))
    {
        $humain->setName( $_POST["name"] );
        $humain->setSurname( $_POST["surname"] );
        $humain->update();
    }
}

?>

<form method="POST">
    <input type="text" value="<?=  $humain->getName(); ?>" placeholder="name" name="name" />
    <input type="text" value="<?=  $humain->getSurname(); ?>" placeholder="surname" name="surname" />
    <input type="submit" name="update" value="ok" />
</form>
