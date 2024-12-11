<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    require_once 'Controlador/controlador.php';
    require_once 'Modelo/GestorCita.php';
    require_once 'Modelo/Cita.php';
    require_once 'Modelo/Paciente.php';
    require_once 'Modelo/conexion.php';

    $controlador = new Controlador();

    if (isset($_GET["accion"])) {
        if ($_GET["accion"] == "asignar") {
            $controlador->cargarAsignar();
        }
        if ($_GET["accion"] == "consultar") {
            $controlador->verPagina('Vista/html/consultar.php');
        }
        if ($_GET["accion"] == "cancelar") {
            $controlador->verPagina('Vista/html/cancelar.php');
        } elseif ($_GET["accion"] == "guardarCita") {
            $controlador->agregarCita(
                $_POST["asignarDocumento"],
                $_POST["medico"],
                $_POST["fecha"],
                $_POST["hora"],
                $_POST["consultorio"]
            );
        } elseif ($_GET["accion"] == "consultarCita") {
            $controlador->consultarCitas($_GET["consultarDocumento"]);
        } elseif ($_GET["accion"] == "cancelarCita") {
            $controlador->cancelarCitas($_POST["cancelarDocumento"]);
        } elseif ($_GET["accion"] == "consultarPaciente") {
            $controlador->consultarPaciente($_GET["documento"]);
        } elseif ($_GET["accion"] == "ingresarPaciente") {
            $controlador->agregarPaciente(
                $_GET["PacDocumento"],
                $_GET["PacNombres"],
                $_GET["PacApellidos"],
                $_GET["PacNacimiento"],
                $_GET["PacSexo"]
            );
        } elseif ($_GET["accion"] == "consultarHora") {
            $controlador->consultarHorasDisponibles($_GET["medico"], $_GET["fecha"]);
        } elseif ($_GET["accion"] == "verCita") {
            $controlador->verCita($_GET["numero"]);
        } elseif ($_GET["accion"] == "confirmarCancelar") {
            $controlador->confirmarCancelarCita($_GET["numero"]);
        }
    } else {
        $controlador->verPagina('Vista/html/inicio.php');
    }
    ?>
</body>

</html>