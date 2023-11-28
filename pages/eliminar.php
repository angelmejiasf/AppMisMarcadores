<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MisMarcadores-Usuario</title>
        <link rel="icon" href="./assets/images/mis-marcadores-1.ico" type="image/x-icon">
        <link rel="shortcut icon" href="./assets/mis-marcadores-1.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    </head>
    <body>
        <div class="container">
            <h1 class="title">Mis Marcadores</h1>
            <a href="./partidosadmin.php"><img src="../assets/images/mis-marcadores-1.ico" width="100px"/></a><br>



            <h2>Eliminar Datos</h2>
            <form action="partidos.php" method="post">
                <p>Competicion</p><input type="text" name='competicion' required="">
                <p>Eliminar por Equipo Local</p><input type="text" name="equipolocal">
                <p>Eliminar por Numero de Goles Local</p><input type="text" name="resultadolocal">
                <p>Eliminar por Equipo Visitante</p><input type="text" name="equipovisitante">
                <p>Eliminar por Numero de Goles Visitante</p><input type="text" name="resultadovisitante"><br>

                <input type="submit" name="submit" value="Insertar">
            </form>


            <?php
            //Conexion Base de Datos
            $cadena_conexion = "mysql:dbname=mismarcadores;host=127.0.0.1";
            $usuario = "root";
            $clave = "";

            try {
                $pdo = new PDO($cadena_conexion, $usuario, $clave);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (isset($_POST['equipolocal']) && !empty($_POST['equipolocal'])) {
                        $equipolocal = $_POST['equipolocal'];

                        $sql = "DELETE FROM $competicion WHERE equipolocal='$equipolocal'";

                        $stmt = $pdo->prepare($sql);

                        $stmt->bindParam(':equipolocal', $equipolocal);

                        // Ejecutar la consulta
                        $stmt->execute();
                    }

                    /** $stmt->bindParam(':resultadolocal', $resultadolocal);
                      $stmt->bindParam(':equipovisitante', $equipovisitante);
                      $stmt->bindParam(':resultadovisitante', $resultadovisitante);



                     */
                    header("Location: partidos.php");
                    exit();
                }
            } catch (Exception $e) {
                echo "La base de datos esta actualmente en mantenimiento, vuelva a intentarlo mas tarde";
            }
            ?>



        </div>
    </body>
</html>