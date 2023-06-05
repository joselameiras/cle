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

$idclase=15;
if (isset($_GET["idclase"])){
    $idclase=$_GET["idclase"];   
}
?>
   <br>
   <div class="container">
    <form  method="get" >
<select  onchange="this.form.submit();" class="form-select" name="idclase" id="cars">
  <option value="1" <?php echo $idclase=="1" ? "selected":""; ?> >2009-2009</option>
  <option value="2" <?php echo $idclase=="2" ? "selected":""; ?> >2010-2010</option>
  <option value="3" <?php echo $idclase=="3" ? "selected":""; ?> >2011-2011</option>
  <option value="4" <?php echo $idclase=="4" ? "selected":""; ?> >2012-2012</option>
  <option value="5" <?php echo $idclase=="5" ? "selected":""; ?> >2013-2013</option>
  <option value="6" <?php echo $idclase=="6" ? "selected":""; ?> >2014-2014</option>
  <option value="7" <?php echo $idclase=="7" ? "selected":""; ?> >2015-2015</option>
  <option value="8" <?php echo $idclase=="8" ? "selected":""; ?> >2016-2016</option>
  <option value="9" <?php echo $idclase=="9" ? "selected":""; ?> >2017-2017</option>
  <option value="10" <?php echo $idclase=="10" ? "selected":""; ?> >2018-2018</option>
  <option value="11" <?php echo $idclase=="11" ? "selected":""; ?> >2019-2019</option>
  <option value="12" <?php echo $idclase=="12" ? "selected":""; ?> >2020-2020</option>
  <option value="13" <?php echo $idclase=="13" ? "selected":""; ?> >2021-2021</option>
  <option value="14" <?php echo $idclase=="14" ? "selected":""; ?> >2022-2022</option>
  <option value="15" <?php echo $idclase=="15" ? "selected":""; ?> >2023-2023</option>
</select> </form><br>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php 
          include "conexion.php";

$sql = "SELECT c.idclase, year(fechainicio) as ini,year(fechafin) as fin, count(distinct idpersona) as cuantos FROM clase c inner join periodo p on p.idperiodo=c.idperiodo
inner join modulo m on m.idclase=c.idclase 
inner join inscripcion i on i.idmodulo=m.idmodulo
where c.idperiodo=$idclase
group by idclase, ini, fin;";

if ($result = $mysqli -> query($sql)) {
  
  while ($row = $result -> fetch_row()) {


                
                ?>
             <div class="col">
                <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header"><?php  echo $row[0] ;?></div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">ciclo <?php  echo $row[1] ;?>-<?php  echo $row[1] ;?></h5>
                    <p class="card-text"><?php  echo $row[3] ;?> Alumnos</p>
                </div>
                </div>
            </div>
 <?php
        
           }
  echo "</table>";
  $result -> free_result();
}

$mysqli -> close();
        ?>
                   
        </div>
   </div>
</body>
</html>