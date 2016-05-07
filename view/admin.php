<?php 

require_once '../control/ControlQuartos.php';

$QQuartos = new ControlQuarto();
$Quartos = $QQuartos->obterQuartos(); 


?>
<script type="text/javascript"> var vez = 0</script>
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
  alterar congressista
  	<form action="../action/alterarCongressista.php" class="clearfix" method="POST" name="sentMessage">
            <div>
	            <label class="label-required">Quarto</label>
	            <input type="text" class="form-control" placeholder="numero Quarto" id="numero" name="numero"  required value= "">
            </div>
            <div>
	            <label class="label-required">CPF</label>
	            <input type="text" class="form-control" placeholder="cpf" id="cpf" name="cpf"  required value= "">
            </div>

            <div>
            	<button>enviar</button>
            </div>
            
    </form>
  
 </body>
</html>

