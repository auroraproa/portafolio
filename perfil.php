<?php
ob_start();
require_once 'db_conexionA.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: misesion.php");
    exit();
}

// Obtener el email del usuario actualmente autenticado
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="registe.css">
    <head>
    </button>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">FRAPPES</a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="images/uno.jpg" class="menu-icono" alt="">
            </label>
 
            <nav class="navbar">
                <ul>
                    <li><a href="misesion.php">Inicio</a></li>
                    <li><a href="actualizar2.php">Actualizar</a></li>
        </div>
 
</head>

<body>
<section>
  <div class="container">
  <style>
  .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
      }
      .card {
        width: 300px;
        border: 1px solid white;
        border-radius: 5px;
        padding: 10px;
      }
      p{
        background: white;
      }
      b{
        background: white;
      }
      </style>
 <section>
        <div class="container" style="width: 80%; margin-top: 90px;">
            <?php
            // Consulta SQL para obtener los datos del usuario actual
            $sql = $cnnPDO->prepare("SELECT * FROM registro WHERE email = :email");
            $sql->bindParam(':email', $email);
            $sql->execute();

            while ($campo = $sql->fetch(PDO::FETCH_ASSOC)) {
                // Aquí muestras los datos del usuario
            ?>
                <div class="card">
                    <div class="card-image">
                    </div>
                    <div class="card-body">
                        <p class="card-text"><b>Email:</b> <?php echo $campo['email']; ?></p>
                        <p class="card-text"><b>Nombre:</b> <?php echo $campo['nombre']; ?></p>
                        <p class="card-text"><b>Ciudad:</b> <?php echo $campo['ciudad']; ?></p>
                        <p class="card-text"><b>Clave:</b> <?php echo $campo['clave']; ?></p>
                        <p class="card-text"><b>Rfc:</b> <?php echo $campo['rfc']; ?></p>
                        <p class="card-text"><b>Direccion:</b> <?php echo $campo['direccion']; ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    
</body>
</html>