<?php include('cabeza.php');?>
<section>
  <p><?php echo($description);?></p>
<h2>Asignaturas</h2>
<?php
$asignaturas = array_map('str_getcsv', file('data/asignaturas.csv'));
array_walk($asignaturas, function(&$a) use ($asignaturas) {$a = array_combine($asignaturas[0], $a);});
array_shift($asignaturas);
$all = count($asignaturas);
?>
<h4>1. Total de créditos para taller y otras asignaturas por nivel de estudio</h4>
<table class="table table-condensed">
  <tr>
    <th>Asignatura</th>
    <th>Créditos necesarios</th>
  </tr>
<?php for($a=0; $a < $all; $a++){?>
  <tr>
    <td><?php echo $asignaturas[$a]["asignatura"]?></td>
    <td><?php echo$asignaturas[$a]["creditos"]?></td>
  </tr>
<?php };?>
</table>

<img src="images/Asignatura_1.jpg" class="img-responsive">

<h4>2. Relación de créditos y costos</h4>

<table class="table table-condensed">
  <tr>
    <th>Asignatura</th>
    <th>Créditos necesarios</th>
    <th>Valor monetario</th>
  </tr>
<?php for($b=0; $b < $all; $b++){?>
  <tr>
    <td><?php echo $asignaturas[$b]["asignatura"]?></td>
    <td><?php echo$asignaturas[$b]["creditos"]?></td>
    <td><?php echo$asignaturas[$b]["costo"]?></td>
  </tr>
<?php };?>
</table>

<h5>2.1. Los "costos" de las asignaturas en primer año (plan común):</h5>
<img src="images/costos_primer_año.jpg" class="img-responsive">

<h5>2.2. Los "costos" de las asignaturas en mención de diseño gráfico:</h5>


<h5>2.3. Los "costos" de las asignaturas en mención de diseño industrial:</h5>

<h4>3. Asignaturas vs. régimen anual y/o semestral</h4>

<table class="table table-condensed">
  <tr>
    <th>Asignatura</th>
    <th>Créditos necesarios</th>
    <th>Régimen</th>
  </tr>
<?php for($c=0; $c < $all; $c++){?>
  <tr>
    <td><?php echo $asignaturas[$c]["asignatura"]?></td>
    <td><?php echo$asignaturas[$c]["creditos"]?></td>
    <td><?php echo$asignaturas[$c]["regimen"]?></td>
  </tr>
<?php };?>
</table>



</section>
<?php include('pie.php');?>
