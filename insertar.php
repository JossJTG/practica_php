<?php
require 'vendor/autoload.php';

use Google\Cloud\Firestore\FirestoreClient;

// Configura Firestore con tu archivo de credenciales
$firestore = new FirestoreClient([
    'keyFilePath' => 'Z:/Xampp/htdocs/prueba_php',
]);

// Datos que deseas agregar a Firestore
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$fecha = $_POST["fecha"];

// Define la colección y un ID único para el documento (Firestore genera automáticamente IDs únicos)
$collection = $firestore->collection('usuarios');

// Datos que deseas agregar como campos en el documento
$documentData = [
    'nombre' => $nombre,
    'apellidos' => $apellidos,
    'fecha' => $fecha,
];

// Agrega un nuevo documento a la colección
$newDocument = $collection->add($documentData);

if ($newDocument->id()) {
    echo "<script>alert('Se ha enviado los datos'); window.location='index.html'</script>";
} else {
    echo "Error al enviar los datos a Firestore.";
}
?>
