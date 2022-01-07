<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Enviar Correos</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php

    include("coneccion.php");
    // ------------------1er Paso--------------------------------
    //$conexion = $base->query("SELECT / FROM DATOS_USUARIOS");
    //$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

    //la linea de abajo es simplificada
    //con esto ya conectamos a la BBDD

    //--------------------Paginacion---------------------

    $tamagno_pagina = 5;    //cantidad de registros por pagina

    //--------------Sigue aca desde abajo de todo--------------
    if (isset($_GET["pagina"])) {
        //con el isset que se ejecute una vez pulsado el promernumero, porque si no ma da que la variable pagina no esta definida.
        if ($_GET["pagina"] == 1) {

            header("Location:index.php");
        } else {

            $pagina = $_GET["pagina"];
        }
    } else {
        $pagina = 1;
    }
    //---------------------------------------------------------

    $empezar_desde = ($pagina - 1) * $tamagno_pagina;
    //si pulso el 3 pagina =3 con el metodo get, 3-1=2 y 2*3 =6
    //guardo en la variable el numero 6 para que lo sustituya en el limit
    //limit 6, 3 

    $sql_total = "SELECT * FROM manda_email";
    /*
    Para paginar agrego LIMIT, 2 parametros primer registro y cantidad de registros.
    Lo primero que necesito es saber cuantos registros tiene la tabla
    y en cuantas paginas lo va a dividir.
    Creo variable $tamagno_pagina
    
    
    */
    $resultado = $base->prepare($sql_total);
    $resultado->execute(array());
    $num_filas = $resultado->rowCount();    //cuenta la cantidad de filas
    $total_paginas = ceil($num_filas / $tamagno_pagina);  //me dice la cantidad de paginas que voy a tener
    //el ceil me da un numero entero

    //--------------------Fin Paginacion-----------------


    $registros = $base->query("SELECT * FROM manda_email LIMIT $empezar_desde,$tamagno_pagina")->fetchAll(PDO::FETCH_OBJ);

    // parte del insert
    if (isset($_POST["cr"])) {
        $nom = $_POST["Nom"];
        $ape = $_POST["Ape"];
        $dir = $_POST["Dir"];
        //El id no hace falta porque es autonumerico
        $sql = "INSERT INTO manda_email (nombre, email, cel) VALUES (:nom, :ape,:dir)";
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":nom" => $nom, ":ape" => $ape, ":dir" => $dir));
        header("location:index.php");
    }


    ?>


    <h1>Enviar correos desde una DDBB</span></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table class="table">
            <tr>
                <th class="primera_fila">Id</th>
                <th class="primera_fila">Nombre</th>
                <th class="primera_fila">Correo</th>
                <th class="primera_fila">Telefono</th>
                <th class="primera_fila"></th>
                <th class="primera_fila"></th>
                <th class="sin">&nbsp;</th>
                <th class="sin">&nbsp;</th>
                <th class="sin">&nbsp;</th>
                <th class="sin">&nbsp;</th>
                <th class="sin">&nbsp;</th>
            </tr>


            <!-- Esta parte es para que las lineas se repitan -->
            <?php
            //--------------------------------------------------------------------------
            // Esta parte es del READ
            foreach ($registros as $persona) :
                /*
            Este es el array donde tengo almacenados todos los objetos de mi BBDD
            $persona es una variable cualquiera
            */
                //-----------------------------------------------------------------------
            ?>

                <tr>
                    <td><?php echo $persona->id ?> </td>
                    <td><?php echo $persona->nombre ?></td>
                    <td><?php echo $persona->email ?></td>
                    <td><?php echo $persona->cel ?></td>

                    <td class="bot"><a href="borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <!-- ------------------------------ -->
                    <!-- Estas lineas son de la edicion -->

                    <td class='bot'><a href="editar.php?id=<?php echo $persona->id
                                                            ?> & nom=<?php echo $persona->nombre ?> 
                                                           & ape=<?php echo $persona->email ?> 
                                                           & dir=<?php echo $persona->cel ?>">
                            <input type='button' name='up' id='up' value='Actualizar'></a></td>
                    <!-- ------------------------------ -->
                </tr>
            <?php
            // READ-------------------------------------------------------------------------------------
            endforeach;
            //Otra forma de hacerlo es concatenando todo para que quede php dentro de cada linea de html
            //------------------------------------------------------------------------------------------

            ?>

            <!-- Esta es la parte del insert con la linea <form action=" <?php //echo $_SERVER['PHP_SELF']; 
                                                                            ?>" method="post">-->
            <tr>
                <td></td>
                <td><input type='text' name='Nom' size='10' class='centrado'></td>
                <td><input type='text' name='Ape' size='10' class='centrado'></td>
                <td><input type='text' name=' Dir' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            <tr>
                <td>

                    <?php

                    // --------------------------------------------------------
                    //aca empieza la parte de abajo con los numeros y saltos de pagina
                    echo "<br>";
                    for ($i = 1; $i <= $total_paginas; $i++) {

                        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
                        //$i tiene que ser un link y lo paso por la url


                    }


                    ?>

                </td>
            </tr>
            </tr>
        </table>
    </form>


   <!-- <p>&nbsp;</p>  -->
    <h1>El mensaje que carge en este formulario se le enviara a toda la BBDD</h1>
    <form name="formulario_contacto" method="post" action="Enviar_mail.php">
        <table class="table">
            <tr>
                <td>
                    <label for="nombre">Nombre: *</label>
                </td>
                <td>
                    <input type="text" name="nombre" maxlength="50" size="25">
                </td>
            </tr>
           
            <tr>
                <td>
                    <label for="email">Dirección de E-mail: *</label>
                </td>
                <td>
                    <input type="text" name="email" maxlength="80" size="35">
                </td>
            </tr>
            
            <tr>
                <td>Asunto:</td>
                <td><label for="asunto"></label>
                    <input type="text" name="asunto" id="asunto">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="comments">Comentarios: *</label>
                </td>
                <td>
                    <textarea name="comentarios" maxlength="500" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" value="Enviar">
                </td>
            </tr>
        </table>
        <h1>* Campos obligatorios</h1>
    </form>


</body>

</html>