<?php 

require_once '../control/ControlQuartos.php';

$QQuartos = new ControlQuarto();
$Quartos = $QQuartos->obterQuartos(); 

?>
<script type="text/javascript"> 
	var vez = 0;
	var timestamp_ant = Math.floor(Date.now()/1000);
</script>
<html>
 <head> 
 	<title>Título da página</title> 
 	<script type="text/javascript" src="trocar.js"></script>
 	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
</script>
</body>
</html>

 </head> 
 <body>
  Quartos
  <?php 
    foreach ($Quartos as $quartos) {?> 
      <div> 
      <?php for($i = 0; $i < $quartos['vagas']; $i++){ ?>   
            <img class="<?php echo $quartos['numero'] ?>" title = "Sem Nome" src="../imagens/semFoto.jpg"/>
        
<?php } ?>
		<?php echo $quartos['numero'] ?>
	</div>
<?php } ?>
  
 </body>
</html>

