<?php

require_once('Database.php');

// Obtener la instancia de la conexión a la base de datos
$db = Database::getInstance();
$connection = $db->getConnection();

//validamos datos del servidor
//$user = "root";
//$pass = "";
//$host = "localhost";

//conetamos al base datos
//$connection = mysqli_connect($host, $user, $pass);

//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$apellido = $_POST["apellido"];
$correo = $_POST["correo"] ;
$contrasena = $_POST["contrasena"] ;



//verificamos la conexion a base datos
if(!$connection) 
        {
            echo "No se ha podido conectar con el servidor" . mysql_error();
        }
  else
        {
            echo "<b><h3>Hemos conectado al servidor Amigas</h3></b>" ;
        }
        //indicamos el nombre de la base datos
        $datab = "comedor";
        //indicamos selecionar ala base datos
        $db = mysqli_select_db($connection,$datab);

        if (!$db)
        {
        echo "No se ha podido encontrar la Tabla";
        }
        else
        {
            header ("location:http://localhost:3000/vista/menu.html");
            //echo "<h3>Tabla seleccionada:</h3>" ;
        }
        //insertamos datos de registro al mysql xamp, indicando nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO registro (nombre, apellido, correo, contrasena)
                             VALUES ('$nombre','$apellido','$correo', '$contrasena')";
                           
                            
        $resultado = mysqli_query($connection,$instruccion_SQL);


        function cargarTabla($connection)
        {
            $consulta = "SELECT * FROM registro";

            $result = mysqli_query($connection,$consulta);

            while ($colum = mysqli_fetch_array($resultado))
                  {
                      echo "<tr>"; 
                      echo "<td><h2>" . $colum['id']. "</td></h2>";
                      echo "<td><h2>" . $colum['nombre']. "</td></h2>";
                      echo "<td><h2>" . $colum['apellido'] . "</td></h2>";
                      echo "<td><h2>" . $colum['correo'] . "</td></h2>";
                    echo "</tr>";
                   }
                   mysqli_close($connection);

        }

        //$consulta = "SELECT * FROM tabla where id ='2'"; si queremos que nos muestre solo un registro en especifivo de ID
        //$consulta = "SELECT * FROM tabla_form";
    /*    
$result = mysqli_query($connection,$consulta);
if(!$result) 
{
    echo "No se ha podido realizar la consulta";
}
echo "<table>";
echo "<tr>";
echo "<th><h1>id</th></h1>";
echo "<th><h1>Nombre</th></h1>";
echo "<th><h1>Apellido</th></h1>";
echo "<th><h1>Correro</th></h1>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result))
 {
    echo "<tr>";
    echo "<td><h2>" . $colum['id']. "</td></h2>";
    echo "<td><h2>" . $colum['nombre']. "</td></h2>";
    echo "<td><h2>" . $colum['apellido'] . "</td></h2>";
    echo "<td><h2>" . $colum['correo'] . "</td></h2>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $connection );

   //echo "Fuera " ;
   echo'<a href="index.html"> Volver Atrás</a>';

*/
?>