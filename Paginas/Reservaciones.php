<?php
require_once "Conexxion.php";
require_once "ManejoBD.php";

$conex = new Conexxion();
$conex->conectar();
if ($conex->getCn() == null) {
    echo "No se conecto";
}

$mbd = new ManejoBD();
$codsMesas = array();
$nomsMesas = array();
$desMesas = array();
$valsMesas = array();
$canPersMesas = array();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Recursos/LOGO_MangezCeci.png" type="image/x-icon">
    <!--links para header y footer-->
    <link rel="stylesheet" href="../Estilos/styleMenu.css">
    <!--links para cuerpo de pagina-->
    <link rel="stylesheet" href="../Estilos/reservaciones.css">
    <title>MangezCesi | Reservaciones</title>
</head>
<body>
    <!--Header-->
    <header id="Header">
        <div class="logo">
            <img src="../Recursos/LOGO_MangezCeci.png">
            <h2 class="nombre_empresa" id="H2">MangezCeci</h2>
        </div>
        <nav>
            <a class="op" href="../Index.html">Inicio</a>
            <a class="op" href="Menu.html">Menú</a>
            <a class="op" href="../About.html">Sobre nosotros</a>
            <a class="op" href="Reservaciones.php">Reservaciones</a>
        </nav>
    </header>
    <div class="atrasHeader"></div>
    <!--main - contenido de la pagina-->
    <main>
        <div class="mesitas">
            <?php
            $codsMesas = $mbd->obtenerDatos($conex->getCn(), "MESAS", "COD_MES");
            $tamano = count($codsMesas);
            $nomsMesas = $mbd->obtenerDatos($conex->getCn(), "MESAS", "NOM_MES");
            $desMesas = $mbd->obtenerDatos($conex->getCn(), "MESAS", "DES_MES");
            $valsMesas = $mbd->obtenerDatos($conex->getCn(), "MESAS", "VAL_MES");
            $canPersMesas = $mbd->obtenerDatos($conex->getCn(), "MESAS", "CAN_PER_MES");
            for ($i = 0; $i < $tamano; $i++) { ?>
                <section class="mesita">
                    <fieldset>
                        <legend class="titulo"><?php echo "$nomsMesas[$i]"; ?></legend>
                        <img src=<?php echo "../Recursos/img_Mesas/" . $codsMesas[$i] . ".png" ?>>
                        <p class="des"> Descripcion: <?php echo "$desMesas[$i]"; ?> </p>
                        <p class="val"> Costo: $<?php echo "$valsMesas[$i]"; ?> </p>
                        <p class="can"> Cantidad de personas: <?php echo "$canPersMesas[$i]"; ?> </p>
                        <?php if ($mbd->obtenerDatoCondicion($conex->getCn(), "MESAS", "DIS_MES", "COD_MES = '" . $codsMesas[$i] . "'") == "S") { ?>
                            <p class="aviso">Disponible</p>
                        <?php } else { ?>
                            <p class="aviso">No disponible</p>
                        <?php } ?>
                    </fieldset>
                </section>
            <?php } ?>
        </div>
        <div class="inputsitos">
            <form action="CompletarReserva.php" method="POST">
                <table>
                    <tr>
                        <th class="titulo" colspan="2">Listo para reservar</th>
                    </tr>
                    <tr>
                        <td class="labelsito">Nombre:</td>
                        <td class="inputsito"><input type="text" id="nom_ped" name="nom_ped" required placeholder="Ingresa solo un nombre"></td>
                    </tr>
                    <tr>
                        <td class="labelsito">Correo Electronico:</td>
                        <td class="inputsito"><input type="email" id="mai_ped" name="mai_ped" required placeholder="example@email.com"></td>
                    </tr>
                    <tr>
                        <td class="labelsito">Numero telefonico:</td>
                        <td class="inputsito"><input type="tel" id="cel_ped" name="cel_ped" required placeholder="solo 10 digitos"></td>
                    </tr>

                    <tr>
                        <td class="labelsito">Mesa:</td>
                        <td class="chkMesas">
                            <?php for ($i = 0; $i < $tamano; $i++) { ?>
                                <?php if ($mbd->obtenerDatoCondicion($conex->getCn(), "MESAS", "DIS_MES", "COD_MES = '" . $codsMesas[$i] . "'") == "S") { ?>
                                    <input name="mesa" value=<?php echo $codsMesas[$i] ?> type="radio" required>
                                    <label for="mesa"><?php echo $nomsMesas[$i] ?></label>
                                <?php }  ?>
                            <?php } ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="labelsito">Fecha a reservar:</td>
                        <td class="inputsito"><input type="date" id="dia_ped" name="dia_ped" required></td>
                    </tr>
                </table>
                 <input type="submit" value="Enviar" class="boton-enviar">
                 
                            </form>
        </div>
    </main>
        
    <!--Scripts para funcionamientos de la pagina-->
    <script src="../Estilos/Scripts.js"></script>
</body>

</html>