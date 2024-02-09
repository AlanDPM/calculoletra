<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN

// Vaciamos algunas variables

$error = "";

$resultado = "";

$dni = "";

// Iniciamos el cliente SOAP

// Escribimos la dirección donde se encuentra el servicio

$url = "https://github.com/KevinJ575/Proctos";

$uri = "calculadoraletras.azurewebsites.net";

$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario

if (isset($_POST['enviar'])) {

// Establecemos los parámetros de envío

if (!empty($_POST['dni']) && (strlen($_POST['dni'])) >= 7) {

$dni = $_POST['dni'];

// Si los parámetros son correctos, llamamos a la función letra de calcularLetra.php

$resultado = "La letra es: ".$cliente->letra($dni);

} else {

$error = "<strong>Error:</strong> Debes introducir un DNI correcto<br/><br/>Ej: 45678987";

}

}

?>
<!DOCTYPE html>

<html>
<head>
<title>Calcular Letra DNI Servicio Web + PHP + SOAP</title>
<link rel="stylesheet" type="text/css" href="/estilo.css">
</head>
<body>
<h1>Obtener letra DNI</h1>

<h2>Servicio Web + PHP + SOAP</h2>

<form action="index.php" method="post">


<?php //IMPORTANTE: ELIMINA EL ESPACIO ANTES DE LA INTERROGACIÓN print "<input type='text' name='dni' value='$dni'>";

print "<input type='submit' name='enviar' value='Calcular Letra'>";

print "<p class='error'>$error</p>";

print "<p style='font-size: 12pt; font-weight: bold; color: #0066CC;'>$resultado</p>";

?>

</form>

</body>

</html