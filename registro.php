<?php require_once('db_conexionB.php'); ob_start();?>
<?php
# Inicia Código de REGISTRAR

if (isset($_POST['registrar'])) {
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $clave = $_POST['clave'];




    

    if (!empty($email) && !empty($nombre) && !empty($ciudad) && !empty($clave)) {
        $sql = $cnnPDO->prepare("INSERT INTO registro(email, nombre, ciudad, clave) VALUES (:email, :nombre, :ciudad, :clave)");
    

        $sql->bindParam(':email', $email);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':ciudad', $ciudad);
        $sql->bindParam(':clave', $clave);

        if ($sql->execute()) {
            // Envío de correo después de la inserción exitosa en la base de datos
            $to = $email;
            $subject = "Bienvenidos";
            
            $message = '<html>
            <head>
                <title>Bienvenido a nuestro sitio</title>
            </head>
            <body>
                <p>¡Gracias por registrarte en nuestro sitio, ' . $nombre . '!</p>
                <p>Aquí tienes una imagen de bienvenida:</p>
                <img src="https://proaaurora.000webhostapp.com/unooo.webp" alt="Imagen de bienvenida">
            </body>
            </html>';
            
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            mail($to, $subject, $message, $headers);
            
            header("Location: acceder.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
        }
    }




        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("location:index.php");
}
# Termina Código de REGISTRAR
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
    <title>CREAR CUENTA</title>
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
                    <li><a href="acceder.php">ACCEDER</a></li>
                    <li><a href="index.php">INICIO</a></li>

                </ul>
            </nav>
        </div>

       <!-- Register form -->
       <section class="form-register">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">CREAR CUENTA</h2>
                        <form method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
        <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="email" name="email" id="email" placeholder="Ingresa tu Email"/>
                            </div>      
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingresa tu Nombre"/>
                            </div>     
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
    <select class="controls" type="text" name="ciudad" id="ciudad" placeholder="Elije tu Ciudad">
    <option value="ciudad">Ciudad</option>
        <option value="Saltillo">Saltillo</option>
        <option value="Quintana Roo">Quintana Roo</option>
        <option value="Mexico">Mexico</option>
        <option value="Zacatecas">Zacatecas</option>
    </select>
</div>
<div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="password" name="clave" id="clave" placeholder="Ingresa tu Clave"/>
                            </div> 
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="password" name="confirmar" id="confirmar" placeholder="Confirmar Clave"/>
                            </div> 
                            


                                                 
                           
                            <div class="form-group form-button">
                                <input type="submit" name="registrar" id="enviar" class="btn-1" value="CREAR"/>
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
                title: 'tu email es incorrecto, pon uno valido'

            })
                return false;

            } else if ($("#nombre").val() == "") {

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
                    title: 'nombre incompleto, llena el campo '
                })
                return false;

            } else if ($("#ciudad").val() == "") {

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
                    title: 'la Ciudad incompleto, llena este campo'
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
                    title: 'Clave incompleta, llena este campo'
                })
                return false;

            } else if ($("#confirmar").val() !== $("#clave").val() || "") {

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
                    title: 'Las contraseñas no coinciden <br/>Por favor confirmar contraseña'
                })
                return false;

            } 

        });

});
</script>