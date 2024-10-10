<?php
ob_start();
require_once 'db_conexionA.php';
session_start(); // Inicia la sesión (debe colocarse al inicio del archivo)
?>
<?php
# Inicia Código de EDITAR o MODIFICAR

if (isset($_POST['editar'])) 
{  
	$email=$_POST['email'];
	$nombre=$_POST['nombre'];
	$ciudad=$_POST['ciudad'];
    $clave=$_POST['clave'];
    $rfc=$_POST['rfc'];
    $direccion=$_POST['direccion'];
	
	if (!empty($email) && !empty($nombre) && !empty($ciudad) && !empty($clave) && !empty($rfc) && !empty($direccion))
	{  
		$sql = $cnnPDO->prepare(
			'UPDATE registro SET nombre = :nombre, ciudad = :ciudad, clave = :clave, rfc = :rfc, direccion = :direccion  WHERE email = :email'
		);
		
		$sql->bindParam(':email',$email);
		$sql->bindParam(':nombre',$nombre);
		$sql->bindParam(':ciudad',$ciudad);
        $sql->bindParam(':clave',$clave);
        $sql->bindParam(':rfc',$rfc);
        $sql->bindParam(':direccion',$direccion);




		$sql->execute();
		unset($sql);
		unset($cnnPDO);
        header("location:perfil.php");

	}
}
# Termina Código de EDITAR o MODIFICAR
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="registe.css">
</head>
<body>
<header class="header">
        <div class="menu container">
            <a href="#" class="logo">FRAPPES</a>
            <input type="checkbox" id="menu">
            <label for="menu">
                <img src="images/uno.jpg" class="menu-icono" alt="">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="perfil2.php">Regresar</a></li>
                </ul>
            </nav>
        </div>
        <section class="form-register">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Actualizar datos</h2>
                        <form method="POST" enctype="multipart/form-data" class="register-form" id="register-form">
        <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="email" name="email" id="email" placeholder="NUEVO CORREO"/>
                            </div>      
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="text" name="nombre" id="nombre" placeholder="NUEVO NOMBRE"/>
                            </div>
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
    <select class="controls" type="text" name="ciudad" id="ciudad" placeholder="ELIJE TU NUEVA CIUDAD">
    <option value="ciudad">Ciudad</option>
        <option value="Saltillo">Saltillo</option>
        <option value="Quintana Roo">Quintana Roo</option>
        <option value="Mexico">Mexico</option>
        <option value="Zacatecas">Zacatecas</option>
    </select>
</div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="password" name="clave" id="clave" placeholder="NUEVA CLAVE"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="text" name="rfc" id="rfc" placeholder="INGRESA RFC"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input class="controls" type="text" name="direccion" id="direccion" placeholder="INGRESA TU DIRECCION"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="editar" id="editar" class="btn-1" value="Actualizar"/>
                            </div>
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>
</body>
</html>