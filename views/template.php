<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylelogin.css" type="text/css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>
    <header>
        <img class="imagenheader" src="/img/header.png" alt="imagen">
        <h1>Universidad Tecnica de Ambato</h1>
    </header>
    <nav>
        <ul>
            <li><a class="estilolista" href="index.php?action=inicio">Inicio</a></li>
            <li><a class="estilolista" href="index.php?action=nosotros">Nosostros</a></li>
            <li><a class="estilolista" href="index.php?action=servicios">Servicios</a></li>
            <li><a class="estilolista" href="index.php?action=contactanos">Contacto</a></li>
            <li><a class="estilolista" href="index.php?action=logout">Salir</a></li>
            
        </ul>
    </nav>
    <section> 
        <?php
        require_once'controller\controller.php';
        $mvc= new McvController();
        $mvc->enlacesPaginasController();
        ?>
    </section>
    <div class="footer">
            <footer>
                <div class="contenedorFooter">
                    <h3 class="universidad-titulo">Universidad Técnica de Ambato</h3>
                    <p class="copyright">COPYRIGHT© 2023 CTT. Todos los derechos reservados.</p>
                    <div class="informacionContacto">
                        <span><img src="img\footer\telefono.png" alt="Teléfono"> (03) 282 - 4804</span>
                        <span><img src="img\footer\correo.png" alt="Email"> educacionvirtual@uta.edu.ec</span>
                        <span><img src="img\footer\whats.png" alt="WhatsApp"> (099) 8918 - 159</span>
                    </div>
                </div>
            </footer>
        </div>
</body>
</html>