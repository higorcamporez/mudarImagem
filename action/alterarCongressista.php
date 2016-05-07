<?php
if(!isset($_SESSION)){
    session_start();
}
$cpf = $_POST['cpf'];
$numero_quarto = $_POST['numero'];


$dados = array(
    'numero_quarto' => $numero_quarto
);

require_once '../control/ControlQuartos.php';
require_once '../control/ControlCongressistas.php';

$CCongressista = new ControlCongressista();
$cong = $CCongressista->obterCongressista('cpf ='. $cpf);

$dadosQ = array('timestamp' => time() );
$Quarto = new ControlQuarto();
$Quarto->alterarQuarto($dadosQ, 'numero ='. $numero_quarto);
$Quarto->alterarQuarto($dadosQ, 'numero ='. $cong[0]['numero_quarto']);



$CCongressista->alterarCongressista($dados, 'cpf = ' . $cpf); 

