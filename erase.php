<?php
session_start(); 

if(isset($_POST["delete_image"]) && isset($_POST["image_id"])) {
    $image_id = $_POST["image_id"]; 

    $logged_in_user_id = $_SESSION['username'];    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "assignment2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $message = ""; 

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql_get_image_info = "SELECT filename, uploaded_by FROM tbl_images WHERE id = $image_id";
    $result = $conn->query($sql_get_image_info);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row["filename"]; 
        $image_owner_id = $row["uploaded_by"]; 

        if ($logged_in_user_id == $image_owner_id) {
            $sql_delete_image = "DELETE FROM tbl_images WHERE id = $image_id";
            if ($conn->query($sql_delete_image) === TRUE) {
                
                $target_dir = "uploads/"; 
                $target_path = $target_dir . $filename; 
                if (unlink($target_path)) { 
                    $message =  "La publicación ha sido eliminada correctamente.";
                } else {
                    $message =  "Error al eliminar el archivo de imagen del servidor.";
                }
            } else {
                $message =  "Error al eliminar la publicación de la base de datos: " . $conn->error;
            }
        } else {
            $message =  "No tienes permiso para eliminar esta publicación.";
        }
    } else {
        $message =  "La publicación no existe.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Display Images</title>
</head>
<body>
<?php
if (!empty($message)) {
    echo "<p>$message</p>";
}
?>
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
        <h2>Images!</h2>
        <div class="form">
            <form class="form">
                <div class="inputBox">
                    <?php include 'displayy.php'; ?>
                    <?php if (!empty($message)) { ?>
                        <p style="color: white;"><?php echo $message; ?></p>
                    <?php } ?>
                </div>
                <div class="links">
                    <a href="choose.html">Go back</a>
                    <a href="logout.php">Log Out?</a>
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
