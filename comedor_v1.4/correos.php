<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = 'jonatan.ivan.martinez@estudiante.uacm.edu.mx';
    $nombre = $_POST['caja-nombre'];
    $texto = $_POST['caja-tex'];
    $header = "From: $nombre <jonasmayhem666@gmail.com>"; 

    $mensajeCompleto = $texto . "\nAtentamente, " . $nombre;

    if (mail($destinatario, "Quejas y Sugerencias", $mensajeCompleto, $header)) {
        echo "<script>alert('Correo enviado exitosamente');</script>";
    } else {
        echo "<script>alert('Error al enviar el correo. Por favor, inténtalo de nuevo.');</script>";
    }

    echo "<script>setTimeout(function() { window.location.href = 'Quejas.html'; }, 1000);</script>";
}
?>
