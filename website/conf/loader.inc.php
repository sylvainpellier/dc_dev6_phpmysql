<?php

if(file_exists("conf/conf.dev.inc.php"))
{
require "conf.dev.inc.php";
} else if(file_exists("conf.prod.inc.php"))
{
require "conf.prod.inc.php";
} else
{
die("error");
}


require "fonctions/portfolios.php";