<?php 

require_once '../control/ControlQuartos.php';

$QQuartos = new ControlQuarto();
$Quartos = $QQuartos->obterQuartosCongressistas($_POST['timestamp']);

if($Quartos == null){
	die();
}
include("../classes/classeQuarto.php");


for($i = 0; $i<count($Quartos) ; $i++) {
		$q = new Quarto();
		$q->numero = $Quartos[$i]['numero'];
		if($Quartos[$i]['nome'] != null){
			$q->congressistas[] = array('nome' => $Quartos[$i]['nome'], 'end' => $Quartos[$i]['end']);
		}
		if($i != count($Quartos)-1 ){
			while ( $i< count($Quartos)-1  AND $Quartos[$i]['numero'] == $Quartos[$i+1]['numero']) {
					$q->congressistas[] = array('nome' => $Quartos[$i+1]['nome'], 'end' => $Quartos[$i+1]['end'] );
				if($i == count($Quartos)-1){
					break;
				}else{
					$i++;
				}
				
			}
		}
		
		$quartos[] = $q;
}
	
	echo json_encode($quartos);
?>