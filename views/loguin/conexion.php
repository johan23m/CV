<?php
// Archivo de conexión a la base de datos
$host = "localhost";
$dbname = "user_authentication";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verificar credenciales en la base de datos
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Login exitoso, redirigir a la página de inicio
        header("Location: dashboard.html");
        exit();
    } else {
        // Login fallido, redirigir de nuevo a la página de inicio de sesión con un mensaje de error
        header("Location: login.html?error=1");
        exit();
    }
}
?>
