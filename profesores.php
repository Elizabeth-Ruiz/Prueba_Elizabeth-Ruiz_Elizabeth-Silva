<?php include('cabeza.php');?>
<section>
<h2>Profesores</h2>
<?php
$profesores = array_map('str_getcsv', file('https://raw.githubusercontent.com/rociormp/csv_profes/master/profesores.csv'));
array_walk($profesores, function(&$a) use ($profesores) {$a = array_combine($profesores[0], $a);});
array_shift($profesores);
$all = count($profesores);
?>

<h4>1. Total de profesores que aportan a la carrera de diseño, y sus categorías académicas</h4>
<table class="table table-condensed">
  <tr>
    <th>Profesor</th>
    <th>Categoría académica</th>
  </tr>
<?php for($a=0; $a < $all; $a++){?>
  <tr>
    <td><?php echo $profesores[$a]["Nombres"]." ".$profesores[$a]["Apellidos"]?></td>
    <td><?php echo$profesores[$a]["Categoría"]?></td>
  </tr>
<?php };?>
</table>


<img src="images/profesores_1.jpg" class="img-responsive">

<h4>2. Académicos en carrera ordinaria, rangos y horas de trabajo</h4>

<table class="table table-condensed">
  <tr>
    <th>Profesor</th>
    <th>Rango</th>
    <th>Horas de trabajo</th>
  </tr>
<?php $cuantos_ordinarios=19;?>
<?php for($b=19; $b < $all; $b++){?>
  <?php if (substr_count($profesores[$b]["Categoría"],'Ordinaria') > 0) {?>
  <tr>
    <td><?php echo $profesores[$b]["Nombres"]." ".$profesores[$b]["Apellidos"]?></td>
    <td><?php echo$profesores[$b]["Rango"]?></td>
    <td><?php echo$profesores[$b]["Horas"]?></td>
    <?php $cuantos_ordinarios++;?>
  </tr>
  <?php };?>
<?php };?>
</table>
<p>Son <?php echo($cuantos_ordinarios);?> Académicos en carrera ordinaria.</p>

<img src="images/profesores_2.png" class="img-responsive">
<h4>3. Académicos en carrera docente, rangos y horas de trabajo</h4>

<table class="table table-condensed">
  <tr>
    <th>Profesor</th>
    <th>Rango</th>
    <th>Horas de trabajo</th>
  </tr>
<?php $cuantos_docentes=17;?>
<?php for($c=17; $c < $all; $c++){?>
  <?php if (substr_count($profesores[$c]["Categoría"],'Docente') > 0) {?>
  <tr>
    <td><?php echo $profesores[$c]["Nombres"]." ".$profesores[$c]["Apellidos"]?></td>
    <td><?php echo $profesores[$c]["Rango"]?></td>
    <td><?php echo $profesores[$c]["Horas"]?></td>
    <?php $cuantos_docentes++;?>
  </tr>
  <?php };?>
<?php };?>
</table>

<p>Son <?php echo($cuantos_docentes);?> Académicos en carrera docente.</p>

<img src="images/profesores_3.png" class="img-responsive">

<h4>4. Grados académicos</h4>

<table class="table table-condensed">
  <tr>
    <th>Profesor</th>
    <th>Rango</th>
    <th>Horas de trabajo</th>
  </tr>
<?php
$cuantos_profesores=0;
$cuantos_doctores=3;
$cuantos_magister=6;
$cuantos_licenciados=7;
?>
<?php for($d=0; $d < $all; $d++){?>
  <?php if (substr_count($profesores[$d]["Rango"],'Profesor') > 0) {?>
  <tr>
    <td><?php echo $profesores[$d]["Nombres"]." ".$profesores[$d]["Apellidos"]?></td>
    <td><?php echo $profesores[$d]["Rango"]?></td>
    <td><?php echo $profesores[$d]["Grado Académico"]?></td>
    <?php if (($profesores[$d]["Grado Académico"])=="Doctor"){?><?php $cuantos_doctores++;?><?php };?>
    <?php if (($profesores[$d]["Grado Académico"])=="Magíster"){?><?php $cuantos_magister++;?><?php };?>
    <?php if (($profesores[$d]["Grado Académico"])=="Licenciado"){?><?php $cuantos_licenciados++;?><?php };?>
    <?php $cuantos_profesores++;?>
  </tr>
  <?php };?>
<?php };?>
</table>

<p>Son <?php echo($cuantos_profesores);?> profesores con rango académicos.</p>
<ul>
<li><?php echo($cuantos_doctores);?> de ellos tienen grado de Doctor.</li>
<li><?php echo($cuantos_magister);?> de ellos tienen grado de Magíster.</li>
<li><?php echo($cuantos_licenciados);?> de ellos tienen grado de Licenciado.</li>
</ul>
<img src="images/profesores_4.jpg" class="img-responsive">
</section>
<?php include('pie.php');?>
