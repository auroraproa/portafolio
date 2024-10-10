<?php
ob_start();
session_start();

require_once('db_conexionB.php');

if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: INICIO.php");
    exit();
}

if (isset($_POST['desactivar'])) {
    $sql = $cnnPDO->prepare("UPDATE registro SET active = 0 ");

    if ($sql->execute()) {
        session_destroy();
        header("Location: INICIO.php"); // Redirigir a la página de inicio después de desactivar
        exit();
    } else {
        echo "Error al desactivar la cuenta.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRAPPES</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header class="header">
        <!-- ... Resto de tu código HTML ... -->
    </header>
    <section class="welcome">
        <div class="welcome-1"></div>
        <div class="welcome-2">
            <h2>BIENVENIDO</h2>
            <p class="b1">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                <!-- ... Resto de tu código HTML ... -->
            </p>
        </div>
    </section>
    <!-- ... Resto de tu código HTML ... -->
</body>
</html>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRAPPES</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
    .btn-link {
    background: none;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    text-decoration: underline;
    color: blue; /* Puedes ajustar el color según tu preferencia */
}
</style>
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
                    <li>
                        <a href="perfil2.php">PERFIL</a>
                        <form method="post" action="misesion.php">
                            <button class="btn-link" name="cerrar_sesion" type="submit">Cerrar sesión</button>
                            <button class="btn-link" name="desactivar" type="submit">Desactivar</button>
                        </form>                        
                    </li>
                    



                </ul>
            </nav>
        </div>
    
        <div class="header-content container">
            <div class="header-txt">
                <h1>FRAPPES</h1>
                <span>Que es </span>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                 Eligendi, illo accusantium magni voluptas 
                 voluptate porro velit fugiat cumque tempora
                  quod maxime officiis? Dolores, nam praesentium.
                   Repudiandae velit officia non facilis?</p>
                   <a href="#" class="btn-1">Informacion</a>
            </div>
            <div class="header-dir">
                <div class="dir">
                    <h3>Direccion</h3>
                    <p>CDMX AV</p>
                </div>
            </div>
            <div class="header-dir">
                <div class="dir">
                    <h3>Telefono</h3>
                    <p>8441234567</p>
                </div>
            </div>
            <div class="header-dir">
                <div class="dir">
                    <h3>Egmail</h3>
                    <p>frappes@gmail.com</p>
                </div>
            </div>
            <div class="header-dir">
                <div class="dir">
                    <h3>Horario</h3>
                    <p>8:00am-10:00pm</p>
                </div>
            </div>
        </div>
    </header>
    <section class="welcome">
        <div class="welcome-1"></div>
        <div class="welcome-2">
        <h2>BIENVENIDO A LA FRAPERIA</h2>
            <p class="b1">
                Lorem ipsum dolor sit amet,
                 consectetur adipisicing elit.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur
                 adipisicing elit. Ipsa enim dolor 
                 veniam nisi delectus, quasi nulla 
                 doloribus vel consequatur ducimus eos,
                  voluptates accusamus suscipit in cum
                   porro ut fuga. Non?</p>
                   <a href="#" class="btn-1">Informacion</a>
        </div>
    </section>
    <main class="services container">
        <div class="services-txt">
            <h2>Nuestros Servicios</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur,
                 adipisicing elit. Suscipit, 
                 quisquam maiores tempora consequatur 
                 excepturi cupiditate dolore error vel
                  autem officiis ducimus expedita adipisci
                   deserunt blanditiis rerum, enim officia
                    quod pariatur.</p>
        </div>
        <div class="services-group">
            
            <div class="services-1">
                <img src="images/fra1.jpg" alt="">
                <h3>Frappe de Chocolate</h3>
                <p>$45.00</p>
                <p>ingredientes: helado de chocolate, leche, vainilla, hielo</p>
                <a href="#">Comprar</a>
            </div>
            <div class="services-1">
                <img src="images/fra2.jpg" alt="">
                <h3>Frappe de Fresa</h3>
                <p>$45.00</p>
                <p>ingredientes: helado de fresa, leche, vainilla, hielo</p>
                <a href="#">Comprar</a>
            </div>
            <div class="services-1">
                <img src="images/fra3.jpg" alt="">
                <h3>Frappe de  Chocolate</h3>
                <p>$45.00</p>
                <p>ingredientes: helado de chocolate, leche, vainilla, hielo</p>
                <a href="#">Comprar</a>
            </div>
            
        </div>
    </main>
    <main class="services container">
        
        <div class="services-group">
            <div class="services-1">
                <img src="images/fra4.jpg" alt="">
                <h3>Frappe de Hersheys</h3>
                <p>$70.00</p>
                <p>Ingredientes: chocolate hersheys, vainilla, hielo</p>
                <a href="#">Saber mas</a>
            </div>
            <div class="services-1">
                <img src="images/fra5.jpg" alt="">
                <h3>Frappe de Fresa con HotKakes</h3>
                <p>$80.00</p>
                <p>ingredientes: fresa, hilo,  hotkakes, leche</p>
                <a href="#">comprar</a>
            </div>
            <div class="services-1">
                <img src="images/fra6.jpg" alt="">
                <h3>Frappe de Unicornio</h3>
                <p>$70.00</p>
                <p>ingredientes: leche vainilla, miel, hielo</p>
                <a href="#">comprar</a>
            </div>
        </div>
    </main>
    <section class="prices">
        <div class="prices-1">
            <h2>Lista de Precios</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Qui beatae libero vero asperiores voluptatum rerum 
                 possimus sed saepe quia? Laudantium hic accusamus 
                 voluptatum repudiandae! Cumque vel fugit nostrum 
                 culpa itaque!</p>
                 <table>
                    <tbody>
                        <tr>
                            <th>FRAPPES</th>
                            <td>$90.00 - $45.00</td>
                        </tr>
                        <tr>
                            <th>PASTELILLOS</th>
                            <td>$70.00 - $50.00</td>
                        </tr>
                        <tr>
                            <th>CAFES FRIO </th>
                            <td>$50.00 - $25.00</td>
                        </tr>
                    </tbody>
                 </table>
                 <a href="#" class="btn-1">Informacion</a>
        </div>
        <div class="prices-2"></div>
    </section>
</body>
</html>