<?php 
ob_start();
session_start(); 
require_once('db_conexionB.php');?>

<?php

if (isset($_POST['cerrar'])) {
      session_destroy();
      header("Location: imdex.php");
      exit();
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>UDEMY</title>
    <link rel="icon" href="images/uno.jpg" type="Images/png">
    <link rel="stylesheet" href="register.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" >UDEMY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">categorias</a>
        </li>
        <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
        <li class="nav-item">
          <a class="nav-link" href="#">Udemy Business</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Enseña en Udemy</a>
        </li>
        
<?php
        // Verificar si el usuario está autenticado
        if (isset($_SESSION['nombre'])) {
            echo "Bienvenido " . $_SESSION['nombre'] ;
        }  
else {
            echo "Bienvenido a la página principal. Por favor, inicia sesión.";
        }
        
        
?>
<form method="post">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="register.php">Crear Curso</a>
        </li>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="vcurso.php">Ver Cursos</a>
        </li>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <button class="btn btn-primary" name="cerrar" type="submit">Cerrar sesion</button>
    
    </div>
  </div>
  </form>
</nav>
</body>
</html>