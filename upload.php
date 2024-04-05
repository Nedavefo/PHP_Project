<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verificar si se ha enviado un archivo
if(isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/"; // Directorio donde se guardarán las imágenes subidas
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // Ruta completa del archivo a subir
    $uploadOk = 1; // Bandera que indica si la subida fue exitosa o no

    #$message = "";
    // Verificar si el archivo es una imagen real o una imagen falsa
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // El archivo es una imagen real
        $uploadOk = 1;
    } else {
        // El archivo no es una imagen real
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si ya existe un archivo con el mismo nombre
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño máximo del archivo (en este ejemplo, 5MB)
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Lo siento, el archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir solo ciertos formatos de archivo (en este ejemplo, solo imágenes jpg, jpeg, png, gif)
    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if(!in_array($file_extension, $allowed_formats)) {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado en 0 por algún error
    if ($uploadOk == 0) {
        echo "Lo siento, tu archivo no fue subido.";
    } else {
        // Si todo está bien, intenta subir el archivo al servidor
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // El archivo se ha subido correctamente, ahora guardamos la información en la base de datos
            $servername = "localhost"; // Cambia esto según tu configuración
            $username = "root"; // Cambia esto según tu configuración
            $password = ""; // Cambia esto según tu configuración
            $dbname = "assignment2";

            // Obtener el nombre de usuario de la sesión
            $uploaded_by = $_SESSION['username']; // Suponiendo que has almacenado el nombre de usuario en $_SESSION['username'] después de iniciar sesión
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Verificar conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Sentencia SQL para crear la tabla tbl_images
            $sql_create_table = "CREATE TABLE IF NOT EXISTS tbl_images (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                filename VARCHAR(255) NOT NULL,
                uploaded_by VARCHAR(255) NOT NULL,
                upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";

            // Ejecutar la sentencia SQL para crear la tabla
            if ($conn->query($sql_create_table) === TRUE) {
                // Preparamos la sentencia SQL para insertar en la tabla tbl_images
                $sql_insert_image = "INSERT INTO tbl_images (filename, uploaded_by) VALUES ('" . basename($_FILES["fileToUpload"]["name"]) . "', '$uploaded_by')";

                if ($conn->query($sql_insert_image) === TRUE) {
                    echo "El archivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido y registrado en la base de datos.";
                    header("Location: display.php");
                    exit(); // Asegúrate de salir del script después de la redirección
                } else {
                    echo "Lo siento, hubo un error al registrar la información del archivo en la base de datos: " . $conn->error;
                }
            } else {
               echo "Error al crear la tabla: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Inicio</title>
</head>
<body>
    <section>

        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        
            <div class="signin">
                <div class="content">
                    <h2>Upload the file!</h2>            
                    <div class="form">
                        <form class="form" action="upload.php" method="POST" enctype="multipart/form-data">
                            <div class="inputBox">
                                <input name="fileToUpload" type="file" accept="image/*">
                                <i>Upload Image</i>
                            </div>
                            <div class="inputBox">
                                <input class="submit" type="submit" value="Upload">
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="footer">
                    <footer>
                        <p>©2024 Georgian College</p>
                    </footer>
                </div> 
            </section>
        </body>
        </html>


