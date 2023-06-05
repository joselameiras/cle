
<?php

$saludo="";

if (isset($_SESSION["idusuario"]))
{
    $saludo="hola " . $_SESSION["nombreusuario"] ;
    $rutasession="sesion.php?salir";
}
else
{
$saludo="iniciar sesion";
$rutasession="sesion.php?iniciar";
}



?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
   
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">CLE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="avance.php">Avance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clases.php">Clases</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listas.php">Listas</a>
            </li>
          </ul>
            <span class="navbar-text">
     <a href="<?php echo $rutasession;?>" target="_self" rel="noopener noreferrer"><?php echo $saludo;?></a>
    </span>
        </div>
      </div>
    </nav>