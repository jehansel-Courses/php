<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>70,71,72,73 - CRUD I. Index</title>
  <link rel="stylesheet" type="text/css" href="70_hoja.css">
</head>

<body>

  <?php
  include("70_conexion.php");

  // Preparamos la consulta sql    
  $sql = "SELECT * FROM `datosUsuarios` 
            WHERE 1";
  //echo "<br>Query: $sql";
  $stmtPDO = $conexionDB->prepare($sql);

  // Ejecutamos la consulta
  $stmtPDO->execute();

  // registros es un array de objetos
  $registros = $stmtPDO->fetchAll(PDO::FETCH_OBJ);
  ?>
  <h1>70,71,72,73 - CRUD I. Index<span class="subtitulo">Create Read Update Delete</span></h1>

  <form action="73_insertar.php" method="GET">
    <table width="50%" border="0" align="center">
      <tr>
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
      </tr>

      <?php
      foreach ($registros as $persona) :
      ?>
        <tr>
          <td><?php echo $persona->id ?></td>
          <td><?php echo $persona->nombre ?></td>
          <td><?php echo $persona->apellido ?></td>
          <td><?php echo $persona->direccion ?></td>
          <td class="bot"><a href="70_borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
          <td class='bot'><a href="70_editar.php?id=<?php echo $persona->id ?>&nom=<?php echo $persona->nombre ?>&ape=<?php echo $persona->apellido ?>&dir=<?php echo $persona->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
        </tr>
      <?php
      endforeach;
      ?>

      <tr>
        <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name='Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>