<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
	<link rel="stylesheet" href="css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<h1>Listado de correos</h1>
	<form name="form1" method="get" action="insertar.php">

		<table class="table">
			<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Correo</th>
					<th scope="col">Telefono</th>
					<th scope="col">Eliminar</th>


					<th scope="col"></th>
				</tr>
			</thead>




			<tbody>
				<?php


				require("coneccion.ini");

				$coneccion = mysqli_connect($db_host, $db_user, $db_pass);

				if (mysqli_connect_errno()) {
					echo "<br>";
					echo "Fallo la coneccion a la BBDD";
					exit();
				}

				mysqli_select_db($coneccion, $db_name) or die("No se encuentra la BBDD");

				mysqli_set_charset($coneccion, "utf8");

				$consult = "SELECT * FROM manda_email";

				$resultado = mysqli_query($coneccion, $consult);

				//while ($fila = mysqli_fetch_row($resultado)) {
				foreach ($resultado as $persona) :
				?>

					<tr>
						<th><?php echo $persona->id ?></th>
						<td><?php echo $persona->nombre  ?></td>
						<td><?php echo $fila[2]; ?></td>
						<td><?php echo $fila[3]; ?></td>
						<td><input type="hidden"></td>
						<td><label for="del">
							</label>

						<td>
							<a href="borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a>
						</td>



					<?php
				endforeach;
				mysqli_close($coneccion);

					?>

					</tr>
					<tr>
						<th></th>
						<td><input type="text" placeholder="Nombre" name="nombre" id="nombre"></td>
						<td><input type="text" placeholder="Correo" name="email" id="email"></td>
						<td><input type="text" placeholder="Celular" name="telef" id="telef"></td>

						<td><input type="submit" name="enviar" id="enviar" value="Guardar"></td>
					</tr>
			</tbody>
			<th></th>
		</table>

	</form>

	</table>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>