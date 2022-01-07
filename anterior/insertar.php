<?php

$nombre = $_GET['nombre'];
$email = $_GET['email'];
$telef = $_GET['telef'];



require("coneccion.ini");

$coneccion = mysqli_connect($db_host, $db_user, $db_pass);

if (mysqli_connect_errno()) {
    echo "<br>";
    echo "Fallo la conección";
    exit();
}

mysqli_select_db($coneccion, $db_name) or die("No se encuentra la BBDD");

mysqli_set_charset($coneccion, "utf8");

$consulta = "INSERT INTO `manda_email`(`nombre`, `email`, `cel`)
VALUES
('$nombre','$email','$telef')";

$result = mysqli_query($coneccion, $consulta);

if ($result == false) {
    echo "Error en la consulta";
} else {
    echo "Registro guardado";
    echo "<table>
    <tr>
        <td>$nombre</td>
    </tr>";
    echo "<table>
        <tr>
            <td>$email</td>
        </tr>";
    echo "<table>
            <tr>
                <td>$telef</td>
            </tr>";
}

echo "<br>";

mysqli_close($coneccion);

header("location:index.php");
