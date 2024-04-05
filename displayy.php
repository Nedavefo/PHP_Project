<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "assignment2";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_images ORDER BY upload_date DESC";
$result = $conn->query($sql);

echo "<div style='max-height: 400px; overflow-y: auto;'>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div style='width: 300px; margin: 10px; border: 1px solid #ccc; padding: 10px;'>"; 
        echo "<p style=\"color: green;\"><span>" . $row["uploaded_by"] . " (" . $row["upload_date"] . ")</span></p>";
        echo "<br>";
        echo "<img src='uploads/" . $row["filename"] . "' alt='imagen' style='max-width: 100%; height: auto;'>";
        echo "<form action='erase.php' method='post'>"; 
        echo "<input type='hidden' name='image_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='delete_image' value='Eliminar'>";
        echo "</form>";
        echo "</div>";
        
    }
} else {
    echo "No se encontraron imágenes.";
}
echo "</div>"; 
$conn->close();
?>


