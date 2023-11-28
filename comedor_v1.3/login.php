<?php



$conn = mysqli_connect("localhost","root" , "", "test");

/*Se crea una condicional por si no hay conexion nos pueda mostrar el error*/
if(!$conn)
{
    die("No hay conexion carnal".mysql_error());
}



/*se crean las varibles quecontedra las variables de los box del HTML */

$nombre = $_POST["txtusuario"];
$pass = $_POST["txtpasword"];


/*Se crea el query(la sonsulta que va hacer el sql)*/

$query = mysqli_query($conn,"SELECT * FROM login WHERE usuario = '".$nombre."' and password = '".$pass."'");

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