<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment2";

$conn = new mysqli($servername, $username, $password, $database);

$message = ""; // Variable para almacenar el mensaje

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table_exists_query = "SHOW TABLES LIKE 'tbl_users'";
$table_exists_result = $conn->query($table_exists_query);

if ($table_exists_result->num_rows == 0) {
    $create_table_sql = "CREATE TABLE tbl_users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30),
            password VARCHAR(30)
        )";

    if ($conn->query($create_table_sql) === TRUE) {
        $message = '<div id="success-message1">Table created successfully</div>';
    } else {
        $message = "Error creating table: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar si las contraseñas son iguales
    if ($password !== $confirm_password) {
        $message = "Las contraseñas no coinciden";
    } else {
        $insert_data_sql = "INSERT INTO tbl_users (
                                username,
                                password
                            ) VALUES ('$username', '$password')";

        if ($conn->query($insert_data_sql) === TRUE) {
            $message = '<div id="success-message2">Information saved successfully!</div>';
            header("Location: registroexitoso.html");
        } else {
            $message = "Error inserting data: " . $conn->error;
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Register</title>
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
    <div class="signin">
        <div class="content">
          <h2>Register</h2>            
              <div class="form">
                  <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <?php echo $message; ?> <!-- Mostrar el mensaje aquí -->
                      <div class="inputBox">
                          <input type="text" name="username" required>
                          <i>Username</i>
                      </div>
                      <div class="inputBox">
                          <input type="password" name="password" required>
                          <i>Password</i>
                      </div>
                      <div class="inputBox">
                          <input type="password" name="confirm_password" required>
                          <i>Confirm Password</i>
                      </div>
                  <div class="inputBox">
                      <input class="submit" type="submit" name="btn-register" value="Register">
                  </div>
              </form>
          </div>
          <div class="footer">
          <footer>
              <p>©2024 Georgian College</p>
          </footer>
      </div> 
</section>
  </body>
</html>


