<?php
require_once('db_conexionA.php');
ob_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    
    // Consulta SQL para verificar si la cuenta está activa
    $query = $cnnPDO->prepare('SELECT * FROM registro WHERE email = :email AND clave = :clave AND active = 1');
    $query->bindParam(':email', $email);
    $query->bindParam(':clave', $clave);
    $query->execute();

    $count = $query->rowCount();
    $campo = $query->fetch();

    if ($count) {
        $_SESSION['email'] = $campo['email'];
        $_SESSION['clave'] = $campo['clave'];
        header("location:misesion.php");
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'><b>La cuenta esta Desactivada</b></div>";
    }
}
ob_end_flush();
?>

<?php 
require_once 'cdn.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="registe.css">

    <!-- Libreria de sweetalert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Sitio web de SweetAlert -->
    <!--  https://sweetalert2.github.io/ -->




</head>
<body>

<header class="header">
        <div class="menu container">
            <a href="#" class="logo">FRAPPES</a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="images/tres.jpg" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="registro.php">REGISTRO</a></li>
                    <li><a href="INICIO.php">INICIO</a></li>

                </ul>
            </nav>
        </div>

       <!-- Register form -->
       <section class="form-register">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Iniciar Sesion</h2>
                        <form method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
        <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="email" name="email" id="email" placeholder="Ingresa tu Email"/>
                            </div>      
                           
<div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="password" name="clave" id="clave" placeholder="Ingresa tu Clave"/>
                            </div> 
                           
                            


                                                 
                           
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="enviar" class="btn-1" value="ENTRAR"/>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>

        <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/m.js"></script>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        let formatoemail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

        $("#enviar").click(function() {

            if ($("#email").val() == "" || !formatoemail.test($("#email").val())) {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: true ,
                    timer: 6000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                //  Aqui pones el mensaje donde diga tittle
                title: 'tu email es incorrecto'

            })
                return false;

            } else if ($("#clave").val() == "") {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'clave incorrecta '
                })
                return false;

            } 

        });

});
</script>