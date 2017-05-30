<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/* Reports for either E_ERROR | E_WARNING | E_NOTICE  | Any Error*/
error_reporting(E_ALL);

echo(abc); /* Notice: abc is an undefined constant */
?>
