<?php

include("coneccion.php");

$id = $_GET["id"];

$base->query("DELETE FROM manda_email WHERE id='$id'");

header("location:index.php");
