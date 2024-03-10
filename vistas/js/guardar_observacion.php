<?php
// Verificar si se recibieron los datos necesarios
if (isset($_POST['codigo']) && isset($_POST['observacion'])) {
    // Obtener el código de venta y la observación enviados desde la solicitud AJAX
    $codigoVenta = $_POST['codigo'];
    $observacion = $_POST['observacion'];

    // Formatear el texto para guardarlo en el archivo de texto
    $textoGuardado = "Código de venta: " . $codigoVenta . "\n";
    $textoGuardado .= "Observación: " . $observacion . "\n\n";

    // Ruta del archivo de texto donde se guardará la observación
    $archivoTexto = 'observaciones.txt';

    // Abrir el archivo en modo de escritura (si no existe, se creará)
    $archivo = fopen($archivoTexto, 'a');

    // Escribir el texto en el archivo
    fwrite($archivo, $textoGuardado);

    // Cerrar el archivo
    fclose($archivo);

    // Enviar una respuesta de éxito al cliente
    echo "Texto guardado exitosamente.";
} else {
    // Enviar un mensaje de error si no se recibieron todos los datos necesarios
    http_response_code(400);
    echo "Error: No se recibieron todos los datos necesarios.";
}
?>
