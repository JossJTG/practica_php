<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'practica');

    // Check if the connection was successful
    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from the form
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];

    // Prepare the SQL statement
    $insertarSQL = "INSERT INTO usuario(nombre, apellidos, fecha) VALUES ('$nombre', '$apellidos', '$fecha')";

    // Execute the SQL statement
    if(mysqli_query($conexion, $insertarSQL)){
        echo "<script>alert('Se ha enviado los datos'); window.location='index.html'</script>";
    } else {
        echo "Error: " . $insertarSQL . "<br>" . mysqli_error($conexion);
    }

    // Close the database connection
    mysqli_close($conexion);
?>
