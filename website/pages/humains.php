<div style="width:500px; margin-top:200Px;"><?php

    if(isset($_POST["name"], $_POST["surname"])) {
        $toto = new Humain();
        $toto->setName($_POST["name"]);
        $toto->setSurname($_POST["surname"]);
        $toto->insert($dbh);
    }
?>
</div>


<form method="POST">
    <input type="text" name="name" />
    <input type="text" name="surname" />
    <input type="submit" value="ok" />
</form>