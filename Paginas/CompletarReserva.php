<?php
require_once "Conexxion.php";
require_once "ManejoBD.php";

$mbd = new ManejoBD();
$conex = new Conexxion();
$conex->conectar();
if ($conex->getCn() == null) {
    echo "No se conecto";
}

$nomPed = $_POST['nom_ped'];
$maiPed = $_POST['mai_ped'];
$celPed = $_POST['cel_ped'];
$mesa = $_POST['mesa'];
$fecPed = $_POST['dia_ped'];

$sql = "INSERT INTO RESERVAS (nom_ped, mai_ped, cel_ped, cod_mes_per, dia_ped) VALUES ('$nomPed', '$maiPed', '$celPed', '$mesa', '$fecPed')";

if ($conex->getCn()->query($sql) === TRUE) {
    echo "Datos insertados correctamente1";
}

$sql2 = "UPDATE MESAS SET DIS_MES = 'N' WHERE COD_MES = '$mesa'";
if ($conex->getCn()->query($sql2) === TRUE) {
    echo "Datos insertados correctamente2";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Recursos/LOGO_MangezCeci.png" type="image/x-icon">
    <link rel="stylesheet" href="../Estilos/styleMenu.css">
    <link rel="stylesheet" href="../Estilos/completarReserva.css">
    <title>MangezCesi | Completar Reserva</title>
</head>

<body>
    <?php require_once 'vistaHeader.html' ?>
    <main>
        <div class="contenedorsaso">
            <h3>Verificación de datos</h3>
            <div class="contenedor">
                <div class="mesa">
                    <?php
                    $nomMesa = $mbd->obtenerDatoCondicion($conex->getCn(), "MESAS", "NOM_MES", " COD_MES = '" . $mesa . "'");
                    ?>
                    <p class="titulito">Mesa de la reservación:</p>
                    <img src=<?php echo "../Recursos/img_Mesas/" . $mesa . ".png" ?>>
                    <p><?php echo "$nomMesa" ?></p>
                </div>
                <div class="datos">
                    <div class="datos">
                        <p class="titulito">Reserva a nombre de:</p>
                        <p class="datito"><?php echo "$nomPed" ?></p>
                        <p class="titulito">Correo solicitado:</p>
                        <p class="datito"><?php echo "$maiPed" ?></p>
                        <p class="titulito">Teléfono celular responsable:</p>
                        <p class="datito"><?php echo "$celPed" ?></p>
                        <p class="titulito">Fecha de la reservación:</p>
                        <p class="datito"><?php echo "$fecPed" ?></p>
                    </div>
                </div>
            </div>
        </div>
        <input id="btnAceptar" class="aceptar" type="button" value="Presiona OK" onclick="mostrarModal()">
        <div id="myModal" class="modal">
            <div class="modal-content">
                <p>Gracias por su reserva, lo esperaremos con gusto</p>
                <input type="button" value="Cerrar" onclick="cerrarModal()">
            </div>
        </div>
    </main>
    <script src="../Estilos/Scripts.js"></script>
    <script>
        function mostrarModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            modal.style.animation = "modalFadeOut 0.3s ease-out";
        }

        function noCorrecto() {
            window.location.href = "Reservaciones.php";
        }

        function cerrarModal() {
            var modal = document.getElementById("myModal");
            modal.style.animation = "modalFadeOut 0.3s ease-out";
            setTimeout(function() {
                modal.style.display = "none";
                modal.style.animation = "";
            }, 300);
        }
    </script>
</body>

</html>