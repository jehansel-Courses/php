<!doctype html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>9 - Operadores comparación</title>
		<style type="text/css">
			h1 {
				text-align: center;
			}

			table {
				background-color: #FFC;
				padding: 5px;
				border: #666 5px solid;
			}

			.no_validado {
				font-size: 18px;
				color: #F00;
				font-weight: bold;
			}

			.validado {
				font-size: 18px;
				color: #0C3;
				font-weight: bold;
			}
		</style>
	</head>

	<body>
		<h1>9 - Operadores comparación</h1>
		<?php
			$var1 = 8;
			$var2 = "8";
			$var3 = "Juan";

			// echo "antes";
			echo "<br>Resultado 1 == : " . ($var1 == $var2);
			
			$res2 = $var1 === $var2;
			echo "<br>Resultado 2 === : " . $res2;
			if($res2) {
				echo "Si";
			} else {
				echo "No";
			}

			$res3 = $var1 != $var3;
			echo "<br>Resultado 3 != : " . ($var1 != $var2);
			if($res3) {
				echo "Si";
			} else {
				echo "No";
			}

			echo "<br>Resultado 4 < : " . ($var1 < $var2);
			echo "<br>Resultado 5 > : " . ($var1 > $var2);
			

		?>

		<form action="" method="post" name="datos_usuario" id="datos_usuario">
			<table width="15%" align="center">

				<tr>
					<td>Nombre:</td>
					<td><label for="nombre_usuario"></label>
						<input type="text" name="nombre_usuario" id="nombre_usuario"></td>
				</tr>

				<tr>
					<td>Edad:</td>
					<td><label for="edad_usuario"></label>
						<input type="text" name="edad_usuario" id="edad_usuario"></td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar"></td>
				</tr>
			</table>
		</form>

		<?php
			if(isset($_POST["enviando"])) {
				$usuario = $_POST["nombre_usuario"];
				$edad = $_POST["edad_usuario"];

				if($usuario == "Juan" && $edad >= 18) {
					echo "<p class=\"validado\">Puedes entrar</p>";
				} else {
					echo "<p class=\"no_validado\">No puedes entrar</p>";
				}

			}

		?>

	</body>

</html>