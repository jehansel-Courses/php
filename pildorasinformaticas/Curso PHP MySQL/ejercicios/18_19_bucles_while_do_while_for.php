<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>18,19 - Bucles - While, Do While y For</title>
</head>

<body>
    <h1>18,19 - Bucles - While, Do While y For</h1>
    <?php

    $var1 = 1;

    print("<br>WHILE");
    while ($var1 <= 5) {
        print("<br>El valor de la variable es: $var1");
        $var1++;
    }
    print("<br>Fin del blucle WHILE<br>");

    print("<br>DO-WHILE");
    do {
        print("<br>El valor de la variable es: $var1");
        $var1++;
    } while ($var1 <= 10);
    print("<br>Fin del blucle DO-WHILE<br>");

    print("<br>FOR");
    for ($i=1; $i < $var1; $i++) { 
        print("<br>El valor de la variable es: $i");
        if ($i == 5) {
            print("<br>Valor máximo alcanzado.");
            break;
        } else {
            continue;
        }
    }
    print("<br>Fin del blucle FOR");
    ?>

</body>

</html>