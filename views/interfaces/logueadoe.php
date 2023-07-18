
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/stylelogin.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>
<body>
      <style>
        .mensajeError {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, 150%);
          background-color: rgba(255, 0, 0, 0.2);
          border: 2px solid red;
          padding: 10px;
          text-align: center;
          color: red;
          font-weight: bold;
          font-size: 18px;
          width: 300px;
        }
      </style>
      <div class="mensajeError">
        Error de autenticación
      </div> 
    <main class="contenido">
    <div class="InicioSes">
    <form action="../../models/verificar.php" method="post"class="formDelLoginmal">
      <h3>Inicia Sesion</h3>
      <div class="EstilosForm">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required>
      </div>
      <div class="EstilosForm">
        <label for="contra">Contraseña</label>
        <input type="password" id="contra" name="contra" required>
      </div>
      <div class="EstilosForm">
        <input type="submit" value="Iniciar sesión" name="btnIngresar">
      </div>
    </form>
  </div>

    </main>  
</body>
</html>