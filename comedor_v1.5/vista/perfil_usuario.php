<?php
require_once('../modelo/Database.php');

// Obtener la instancia de la conexión a la base de datos
$db = Database::getInstance();
$connection = $db->getConnection();

/* Verificamos si hay conexión a la base de datos */
if (!$connection) {
    die("No hay conexión: " . mysqli_connect_error());
}

/* Inicializamos la sesión */
session_start();

/* Creamos una condición en el caso de que no sea usuario */
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../vista/index.html");
    exit();
}

/* Declaramos una variable y le asignamos nuestra variable de sesión */
$iduser = $_SESSION['id_usuario'];

/* Declaramos otra variable para realizar la consulta */
$sql = "SELECT id, nombre, apellido, correo FROM registro WHERE id = ?";

/* Preparamos la consulta SQL */
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $connection->error);
}

/* Vinculamos el parámetro */
$stmt->bind_param("i", $iduser);

/* Ejecutamos la consulta */
$stmt->execute();

/* Obtenemos el resultado */
$resultado = $stmt->get_result();
if ($resultado === false) {
    die("Error en la ejecución de la consulta: " . $stmt->error);
}

/* Creamos otra variable y utilizamos la función fetch_assoc */
$row = $resultado->fetch_assoc();

$stmt->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="shortcut icon" href="../img/logof.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <center>
        <div class="img_portada">
            <img src="../img/uacm_cuau.jpg" alt="plantel" height="350px" width="1150px">
        </div>
    </center>

    <main class="cajaPrincipal">
    <article class="cajaUsuario">
        <img src="../img/ajolote_uacm.jpg" alt="uacm_mascota" height="140px" width="600px">
        <center>
            <form name="Usuario" action="#">
                <div class="usuarioInfo">
                    <div class="usuarioCampo">
                        <div class="campoTitulo">Nombre</div>
                        <div class="campoValor"><?php echo htmlspecialchars(utf8_decode($row['nombre'])); ?></div>
                    </div>
                    <div class="usuarioCampo">
                        <div class="campoTitulo">Apellido</div>
                        <div class="campoValor"><?php echo htmlspecialchars(utf8_decode($row['apellido'])); ?></div>
                    </div>
                    <div class="usuarioCampo">
                        <div class="campoTitulo">Correo</div>
                        <div class="campoValor"><?php echo htmlspecialchars(utf8_decode($row['correo'])); ?></div>
                    </div>
                </div>
            </form>
        </center>
    </article>
</main>



    <div class="navegacion">
        <div class="menupalanca"></div> 
        <ul>
            <li class="list" style="--clr:#f44336;">
                <a href="menu.html">
                    <span class="icon">
                        <ion-icon name="home-outline"></ion-icon>
                    </span>
                    <span class="texto">Menu</span>
                </a>
            </li>
            <li class="list active" style="--clr:#ffa117;">
                <a href="usuario-perfil.html">
                    <span class="icon">
                        <ion-icon name="person-outline"></ion-icon>
                    </span>
                    <span class="texto">Usuario</span>
                </a>
            </li>
            <li class="list" style="--clr:#0fc70f;">
                <a href="Boletos.html">
                    <span class="icon">
                        <ion-icon name="cart-outline"></ion-icon>       
                    </span>
                    <span class="texto">Boletos</span>
                </a>
            </li>
            <li class="list" style="--clr:#2196f3;">
                <a href="quejas-perfil.html">
                    <span class="icon">
                        <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                    </span>
                    <span class="texto">Quejas</span>
                </a>
            </li>
            <li class="list" style="--clr:#b145e9;">
                <a href="Configuracion.html">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="texto">Configuración</span>
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
    <script src="../controlador/script.js"></script>
</body>
</html>
