<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Documento sin título</title>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

  <h1>Actualizar Registros</h1>
  <?php
  //------------------------------------------------------------------------
  //Hago esta linea para conectarme y guardad los datos actualizados
  include("coneccion.php");
  //------------------------------------------------------------------------

  /*
  Ahora tengo que hacer un if para que me lea los $_GET cuando trae info de la otra pagina y no le el $_POST que uso para hacer el update
  */

  if (!isset($_POST["bot_actualizar"])) {
    $id = $_GET["id"];
    $nombre = $_GET["nom"];
    $apellido = $_GET["ape"];
    $direccion = $_GET["dir"];
  } else {

    $id = $_POST["id"];             //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $nombre = $_POST["nom"];        //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $apellido = $_POST["ape"];      //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post
    $direccion = $_POST["dir"];     //Le puse _actualizada pero puedo usar el mismo nombre uqe en el post



    $sql = "UPDATE manda_email SET nombre=:miNom, email=:miApe, cel=:miDir WHERE id=:miId";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":miId" => $id, ":miNom" => $nombre, ":miApe" => $apellido, ":miDir" => $direccion));

    header("location:index.php");
  }
  ?>

  <p>

  </p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

    <!--
  Para usar la linea anterior me conecte a la BBDD, y use el metodo post porque si uso el get viajan en la url y se me sobreescribirian
  con PHP_SELF Mando todo a esta misma pagina

-->

    <table class="table">
      <tr>
        <th></th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <!-- Si quiero no mostrar el id saco la etiqueta de php y listo -->
        </th>
      </tr>
      <tr>
        <th scope="col">Nombre</th>
        <th><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="<?php echo $nombre ?>">
        </th>

        <th scope="col">email</th>
        <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="<?php echo $apellido ?>">
        </td>

        <th scope="col">Telefono</th>
        <td><label for="dir"></label>

          <input type="text" name="dir" id="dir" value="<?php echo $direccion ?>">
        </td>

        <th><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></th>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</body>

</html>