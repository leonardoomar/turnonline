<?php

$os = simplexml_load_file("osociales.xml");

?>

<h2>Leyendo obras sociales</h2>
<?php foreach ($os->obrasocial as $obs):?>
<h4>
  <?php echo sprintf("%d - %s, %s",
          $obs['idObraSocial'],
          $obs->nombre,
          $obs->observaciones);
  ?>
</h4>
<?php endforeach;?>
