<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $dni = $_POST["dni"];
    $fechaNacimiento = $_POST["fecha_nacimiento"];

    $errores = [];

    // Validación del nombre
    if (strlen($nombre) < 3) {
        $errores[] = "El nombre debe tener al menos 3 caracteres.";
    }

    // Validación del apellido
    if (strlen($apellido) < 3) {
        $errores[] = "El apellido debe tener al menos 3 caracteres.";
    }

    // Validación del teléfono
    if (strlen($telefono) < 9 || strlen($telefono) > 14) {
        $errores[] = "El teléfono debe tener entre 9 y 14 caracteres.";
    }

    // Validación del email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido.";
    }

    // Validación del DNI
    if (!preg_match("/^[0-9]{8}[A-Za-z]{1}$/", $dni)) {
        $errores[] = "El DNI no es válido.";
    }

    // Validación de la fecha de nacimiento
    $fechaActual = date("Y-m-d");
    if ($fechaNacimiento >= $fechaActual) {
        $errores[] = "La fecha de nacimiento debe ser anterior a la fecha actual.";
    }

    // Si no hay errores, procesar los datos
    if (empty($errores)) {
        // Aquí puedes realizar las operaciones que necesites con los datos enviados
        // ...

        // Redireccionar a una página de éxito o mostrar un mensaje
        header("Location: exito.html");
        exit;
    }
}
?>

