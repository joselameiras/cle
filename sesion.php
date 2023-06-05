<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

   .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>
<body>
<?php
session_start();
/*TODO 
recibir datos del formulario y consultar a la base de datos 
utilizar
a) libreria mysqli
b) encriptar la contraseña para la consulta a la bd con un algoritmo de una sola via como md5
c) crear las variables de sesión para el id, rol y nombre del usuario.

*/
if(isset($_POST["usuario"]) and isset($_POST["pwd"]) )
{
$_SESSION["nombreusuario"]=$_POST["usuario"];
$_SESSION["idusuario"]=1;
 


}
elseif (isset($_GET["salir"]))
{
    session_destroy();
}

include "menu.php";
?>  

<!-- TODO  formulario con usuario y contraseña -->
<div class="form-signin">
 <form class="form-signin" method="post">
       <h1 class="h4 mb-3 font-weight-normal center">Ingrese  Usuario <br>y contraseña</h1>
      <label for="inputEmail" class="sr-only">Usuario</label>
      <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" name="pwd" class="form-control" placeholder="Contraseña" required="">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      
    </form>
</div>

</body>
</html>