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
$idciclo=15;
if (isset($_GET["idciclo"])){
    $idciclo=$_GET["idciclo"];   
}
?>
<br>
<div class="container">
    <form  method="get" action="listas.php">
<select  onchange="this.form.submit();" class="form-select" name="idciclo" id="cars">
  <option value="1" <?php echo $idciclo=="1" ? "selected":""; ?> >2009-2009</option>
  <option value="2" <?php echo $idciclo=="2" ? "selected":""; ?> >2010-2010</option>
  <option value="3" <?php echo $idciclo=="3" ? "selected":""; ?> >2011-2011</option>
  <option value="4" <?php echo $idciclo=="4" ? "selected":""; ?> >2012-2012</option>
  <option value="5" <?php echo $idciclo=="5" ? "selected":""; ?> >2013-2013</option>
  <option value="6" <?php echo $idciclo=="6" ? "selected":""; ?> >2014-2014</option>
  <option value="7" <?php echo $idciclo=="7" ? "selected":""; ?> >2015-2015</option>
  <option value="8" <?php echo $idciclo=="8" ? "selected":""; ?> >2016-2016</option>
  <option value="9" <?php echo $idciclo=="9" ? "selected":""; ?> >2017-2017</option>
  <option value="10" <?php echo $idciclo=="10" ? "selected":""; ?> >2018-2018</option>
  <option value="11" <?php echo $idciclo=="11" ? "selected":""; ?> >2019-2019</option>
  <option value="12" <?php echo $idciclo=="12" ? "selected":""; ?> >2020-2020</option>
  <option value="13" <?php echo $idciclo=="13" ? "selected":""; ?> >2021-2021</option>
  <option value="14" <?php echo $idciclo=="14" ? "selected":""; ?> >2022-2022</option>
  <option value="15" <?php echo $idciclo=="15" ? "selected":""; ?> >2023-2023</option>
</select> </form>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">M1</th>
      <th scope="col">M2</th>
      <th scope="col">M3</th>
      <th scope="col">M4</th>
      <th scope="col">M5</th>
      <th scope="col">M6</th>
      <th scope="col">Tel</th>
      <th scope="col">Correo</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
 



include "conexion.php";

$sql = "select p.idpersona,p.nombre,m1.calificacion as m1, m2.calificacion as m2, m3.calificacion as m3, m4.calificacion as m4, m5.calificacion as m5, m6.calificacion as m6 , p.correoe,p.telefono  from 
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=1) m1 left outer join
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=2) m2 on m1.idpersona=m2.idpersona left outer join
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=3) m3 on m1.idpersona=m3.idpersona  left outer join
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=4) m4 on m1.idpersona=m4.idpersona  left outer join
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=5) m5 on m1.idpersona=m5.idpersona  left outer join
(select idpersona,calificacion,numero from inscripcion i 
inner  join modulo m1 on m1.idmodulo =i.idmodulo where numero=6) m6 on m1.idpersona=m6.idpersona  inner join
persona p on p.idpersona=m1.idpersona
where m1.idpersona in  (select idpersona from inscripcion i inner join modulo m on m.idmodulo=i.idmodulo where m.idclase=$idciclo) limit 10;";

if ($result = $mysqli -> query($sql)) {
  
  while ($row = $result -> fetch_row()) {
      
      
      $nombre=$row[1];
      $id=$row[0];

                ?>
      <tr >
      <th scope="row"><a target="_blank" href="avance.php?idpersona=<?php  echo $row[0] ;?>"><?php  echo $row[1] ;?></a></th>
      <td class="calif"><?php  echo $row[2] ;?></td>
      <td class="calif"><?php  echo $row[3] ;?></td>
      <td class="calif"><?php  echo $row[4] ;?></td>
      <td class="calif"><?php  echo $row[5] ;?></td>
      <td class="calif"><?php  echo $row[6] ;?></td>
      <td class="calif"><?php  echo $row[7] ;?></td>
      <td ><?php  echo $row[8] ;?></td>
      <td ><?php  echo $row[9] ;?></td>
    </tr>
        <?php
        
           }
  echo "</table>";
  $result -> free_result();
}

$mysqli -> close();
        ?>
  </tbody>
</table>
</div>
 
</body>
<script type="text/javascript">

const elements = document.querySelectorAll('.calif');
Array.from(elements).forEach((element, index) => {
  if(parseInt(element.innerText)>=70)
  {
    //alert(1);
     element.setAttribute("class", "table-success");
  }
  else if(parseInt(element.innerText)<70 && parseInt(element.innerText)>=0)
  {
    // alert(1);
     element.setAttribute("class", "table-danger");
  }
});
</script>
</html>
