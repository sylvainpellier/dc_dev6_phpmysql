<a href="exercice2.php?nb1=12&nb2=43&calcul=addition">12+43= ?</a><br />
<a href="exercice2.php?nb1=3&nb2=4&calcul=soustraction">3-4= ?</a><br />


<form action="exercice2.php" method="post">

    <input type="text" value="" name="nb1" />
    <input type="text" name="nb2" />
    <input type="text" name="calcul" />

    <input type="submit" value="ok" />

</form>


<?php

var_dump($_GET);
echo"<hr />";
var_dump($_POST);
echo"<hr />";

function calcul($a,$b,$type)
{
    switch($type)
    {
        case "addition": return $a + $b; break;
        case "soustraction": return $a - $b; break;
        case "division":
            if($b !== 0)
            {
                return $a / $b;
            }
            break;
    }
}

if(isset($_POST["nb1"],$_POST["nb2"],$_POST["calcul"]))
{
    echo calcul( (int)$_POST["nb1"],(int)$_POST["nb2"],$_POST["calcul"] );
}