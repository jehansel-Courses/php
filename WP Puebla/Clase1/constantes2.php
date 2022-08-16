<?php


define("MAXSIZE", 100);



echo MAXSIZE;

echo constant("MAXSIZE"); // Lo mismo que la línea anterior



// Nombres de constants correctos

define("FOO",     "something");

define("FOO2",    "something else");

define("FOO_BAR", "something more");



// Nombres de constantes incorrectos

define("2FOO", "something");