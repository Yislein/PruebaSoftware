<?php

require_once('Database.php');

// Obtener la instancia de la conexión a la base de datos
$db = Database::getInstance();
$connection = $db->getConnection();


//$conn = mysqli_connect("localhost","root" , "", "comedor");

/*Se crea una condicional por si no hay conexion nos pueda mostrar el error*/
if(!$connection)
{
    die("No hay conexion carnal".mysql_error());
}



/*se crean las varibles quecontedra las variables de los box del HTML */

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpasword"];


/*Se crea el query(la sonsulta que va hacer el sql)*/

$query = mysqli_query($connection,"SELECT * FROM registro WHERE correo = '".$nombre."' and contrasena = '".$pass."'");

//En otra variable almacenamos el numero de fila que es la uno

$nr = mysqli_num_rows($query);

//Si la fila es igual a uno va poder ingresar

if($nr == 1)
{
    header ("location:http://localhost:3000/menu.html");
    //echo "Bienvenido: ".$nombre;

}

else if($nr == 0)
{
    header ("location:http://localhost:3000/error.html");
    //echo  "no ingreso";
}

?>