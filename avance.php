<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include "menu.php";
?><br>
<div class="container">

     <table class="table">
  <thead>
    <tr>
      <th scope="col"># Modulo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Calificación</th>
      <th scope="col">Constancia</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
    $idpersona=14330;
    $modulo=1;
if (isset($_GET["idpersona"])){
    $idpersona=$_GET["idpersona"];
    
}
elseif(isset($_SESSION["idpersona"]))
{
    $idpersona=$_SESSION["idpersona"];
}

 if ($idpersona<>0){
 include "conexion.php";


$sql = "SELECT numero,nombre,calificacion FROM inscripcion i inner join modulo m on i.idmodulo=m.idmodulo inner join persona p on p.idpersona=i.idpersona
where i.idpersona=$idpersona;";

if ($result = $mysqli -> query($sql)) {
     while ($dato = $result -> fetch_row()) {
           
            //TODO conexion a la base de datos
           
                $estado="";
              /*  if ($dato[2]>=70)
                {
$estado="table-success";
                }
                elseif($dato[2]<70 and $dato[2]>0 )
                {
                    
$estado="table-danger";
                }
                else
                {

                $estado="";
                }
                */
                ?>            
      <tr class="<?php  echo $estado ;?>">
      <th scope="row"><?php  echo $dato[0] ;?></th>
      <td><?php  echo $dato[1] ;?></td>
      <td><?php  echo $dato[2] ;?></td>
      <td></td>
    </tr>
         <?php
         $modulo=$dato[0];
 }

  $result -> free_result();
}

$mysqli -> close();   
 }   
if ($modulo==6){
$inscribir="modulos finalizados ";
}
else
{
$modulosig=$modulo+1;
$inscribir="Inscribir al modulo $modulosig ";
}
 
        ?>
  </tbody>
</table>

<form  method="get"  action="inscribir.php">
  <input type="hidden" name="idalumno" value="<?php echo $idpersona?>">
  <input type="hidden" name="modulo" value="<?php echo $modulosig?>">
  <input type="submit" <?php echo $modulo=="6" ? "disabled":""; ?> value="<?php echo $inscribir?>">
</form>
</div>
 
</body>
</html>