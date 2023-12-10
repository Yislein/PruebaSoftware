<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="shortcut icon" href="img/logof.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
    
        <center>
            <div class="img_portada">
                <img src="img/uacm_cuau.jpg"  alt="plantel" height="350px" width="1150px"  >
    
            </div>

        </center>

        <main class="cajaPrincipal">
            <article class="cajaUsuario">
                <img src="img/ajolote_uacm.jpg" alt="uacm_mascota" height="140px" width="600px">
                   
                <center>
                <?php

require_once('Database.php');

// Obtener la instancia de la conexión a la base de datos
$db = Database::getInstance();
$connection = $db->getConnection();

// Verificar la conexión y realizar la consulta
if (!$connection) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM registro where id = '1'";
$result = mysqli_query($connection, $sql);

if (!$result) {
    echo "No se ha podido realizar la consulta";
} else {
    echo "<table>";
    echo "<tr>";
    //echo "<th><h1>id</h1></th>";
    echo "<th><h1>Nombre</h1></th>";
    echo "<th><h1>Apellido</h1></th>";
    echo "<th><h1>Correo</h1></th>";
    echo "</tr>";

    while ($mostrar = mysqli_fetch_array($result)) {
        echo "<tr>";
        //echo "<td><h2>" . $mostrar['id'] . "</h2></td>";
        echo "<td><h2>" . $mostrar['nombre:'] . "</h2></td>";
        echo "<td><h2>" . $mostrar['apellido:'] . "</h2></td>";
        echo "<td><h2>" . $mostrar['correo:'] . "</h2></td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Cerrar la conexión
mysqli_close($connection);
?>
    
                    
                </center>
                

            </article>
            

        </main>
        



        



    <div class="navegacion">
        
        <div class="menupalanca"></div> 
        <ul>
            <li class="list " style="--clr:#f44336;">
                <a href="menu.html">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="texto">
                        Menu
                    </span>
                </a>
            </li>
            <li class="list active" style="--clr:#ffa117;">
                <a href="usuario-perfil.html">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="texto">
                        Usuario
                    </span>
                </a>
            </li>
            <li class="list" style="--clr:#0fc70f;">
                <a href="Boletos.html">
                    <span class="icon">
                        <ion-icon name="cart-outline"></ion-icon>       
                    </span>
                    <span class="texto">
                        Boletos
                    </span>
                </a>
            </li>
            <li class="list" style="--clr:#2196f3;">
                <a href="quejas-perfil.html">
                    <span class="icon">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </span>
                    <span class="texto">
                    Quejas
                    </span>
                </a>
            </li>
            <li class="list" style="--clr:#b145e9;">
                <a href="Configuracion.html">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="texto">
                        Configuración
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <hr>

    <center>
        <small>
            *Desarrolladores
           <ol>
           <li>-katheri</li>
           <li>-Aylin</li>
           <li>-Jonatan</li>
            </ol>

        </small>
                  
    </center>
    
    
    

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="script.js"></script>
</body>
</html>
