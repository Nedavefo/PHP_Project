<?php
$servername = "localhost"; // Cambia esto según tu configuración
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "assignment2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener imágenes de la base de datos
$sql = "SELECT * FROM tbl_images ORDER BY upload_date DESC";
$result = $conn->query($sql);

// Estilo para el contenedor principal con barra de desplazamiento vertical
echo "<div style='max-height: 400px; overflow-y: auto;'>"; // Establece una altura máxima y agrega una barra de desplazamiento vertical
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div style='width: 300px; margin: 10px; border: 1px solid #ccc; padding: 10px;'>"; // Estilo del contenedor de imagen
        echo "<p style=\"color: green;\"><span>" . $row["uploaded_by"] . " (" . $row["upload_date"] . ")</span></p>";
        echo "<br>";
        echo "<img src='uploads/" . $row["filename"] . "' alt='imagen' style='max-width: 100%; height: auto;'>"; // Estilo de la imagen
        echo "<form action='erase.php' method='post'>"; // Modificado para enviar a erase.php
        echo "<input type='hidden' name='image_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='delete_image' value='Eliminar'>";
        echo "</form>";
        echo "</div>";
        
    }
} else {
    echo "No se encontraron imágenes.";
}
echo "</div>"; // Cierre del contenedor principal con barra de desplazamiento vertical
$conn->close();
?>


