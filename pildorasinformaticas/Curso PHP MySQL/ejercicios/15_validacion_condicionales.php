<?php
    if (isset($_POST["enviando"])) {
        $edad = $_POST["edad_usuario"];

        if ($edad <= 18) {
            echo "Eres menor de edad";
        } else if($edad <=40) {
            echo "Eres joven";
        } else if($edad <= 65) {
            echo "Eres maduro";
        } else {
            echo "Cu&iacute;date";
        }

    }
?>