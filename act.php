<?php
    session_start();
    require_once 'db_conexionA.php'; 

    # Inicia Código de EDITAR o MODIFICAR
    if (isset($_POST['edita'])) 
    {  
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $clave=$_POST['clave'];
        
        if (!empty($telefono) && !empty($email) && !empty($clave))
        {  
            $sql = $cnnPDO->prepare(
                'UPDATE registro SET telefono = :telefono, email = :email, clave = :clave WHERE telefono = :telefono'
            );
            
            $sql->bindParam(':email_nuevo',$email);
            $sql->bindParam(':clave_nuevo',$clave);
            $sql->bindParam(':telefono', $_SESSION['telefono']);

            $sql->execute();
            unset($sql);
            unset($cnnPDO);

            session_destroy();
            header("location:perfil.php");
            exit();  
        }
    }
    ?>
    <?php
if(isset($_POST["registra"]))
{
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    if (!empty($email)&& ! empty($clave))
    {     
        $sql=$cnnPDO->prepare("INSERT INTO registro
            (email, clave) VALUES (:email, :clave)");

        //Asignar el contenido de las variables a los parametros
        $sql->bindParam(':email',$email);
        $sql->bindParam(':clave',$clave);
        $sql->bindParam(':telefono',$_SESSION['telefono']);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR PERFIL</title>
    <link rel="stylesheet" href="reister.css">
    <style>
      .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
      }
      .card {
        width: 300px;
        border: 1px solid #ccc;
        padding: 10px;
      }
      .card-image {
        text-align: center;
        margin-bottom: 10px;
      }
      .card-image img {
        width: 100px;
        height: 100px;
        object-fit: contain;
      }
      body{
        background-image: url(images/uno.jpg);
      }
      nav{
        background-color: black;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
  <img src="images/uno.jpg" alt="Logo" class="logo" height="60 px" width="110 px" >
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="perfil2.php">Regresar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Section Para publicar Imagenes -->
<section>
  <div class="container" style="width:80%;margin-top:90px;">
  <?php
    $sql = $cnnPDO->prepare("SELECT * FROM registro where email = :emaiñ");
    $sql->bindParam(':telefono', $_SESSION['telefono']);
    $sql->execute();
    ?>

    <div class="card-container">
      <?php
      while ($campo = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="card">
        <div class="card-head">
          <div class="card-body">
            <form method="post" action="">
            <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese su Nombre de Usuario"
                  value="<?php echo $GLOBALS['$nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="username">Numero de celular:</label>
                <input type="text" class="form-control" name="telefono" placeholder="Ingrese su Nuevo numero" value="<?php echo $campo['telefono']; ?>">
            </div>                
            <div class="form-group">
                  <label for="nombre">Email:</label>
                  <input type="text" class="form-control" name="email" placeholder="Ingrese su Email"
                  value="<?php echo $GLOBALS['$email']; ?>">
            </div>
        
            <div class="form-group">
                  <label for="nombre">Clave:</label>
                  <input type="text" class="form-control" name="clave" placeholder="Ingrese tu clave"
                  value="<?php echo $GLOBALS['$clave']; ?>">
            </div>
           
            <div class="form-outline mb-4">
                <textarea class="form-control" name="comentario" rows="4" placeholder="">tus datos fueron actualizados </textarea>
            </div>
           
        </form>           
            
            
            <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
              <i class="fas fa-save"></i>
            </button>          
            </div>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</section>
