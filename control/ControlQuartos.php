<?php

if(!isset($_SESSION)){
    session_start();
}

ini_set('display_errors', true); 
error_reporting(E_ALL);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/MySqlModel.php';


class ControlQuarto {
    
    public $db;
    
    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "quarto";
    }
    

    public function cadastrarQuarto($dados){
        if($this->db->inserir($dados)){
            
           echo '<script> location.href="../view/cadastrarQuarto.php" </script>';
        }else{
            die('Quarto NAO cadastrado');
        }
    }

    public function excluirQuarto($where){
        if($this->db->deletar($where)){
            echo '<script> location.href="../view/quartos.php" </script>';
            die('Quarto excluido');
        }else{
            '<script> location.href="../view/quartos.php" </script>';
            die('Erro ao excluir cliente');
        }

    }
    public function obterQuartosCongressistas( $paramentro){
        //$sql = "SELECT `quarto`.* , `congressista`.`nome`, `congressista`.`end` FROM `quarto` left JOIN `congressista` ON `congressista`.`numero_quarto` = `quarto`.`numero` ORDER BY numero ASC WHERE `quarto.timestamp` > $paramentro";

        $sql ="SELECT `quarto`.* , `congressista`.`nome`, `congressista`.`end` FROM `quarto` LEFT JOIN `congressista` ON `congressista`.`numero_quarto` = `quarto`.`numero` WHERE `timestamp` > $paramentro ORDER BY numero ASC";
        return $this->db->runQuery($sql);
    }  
    public function obterQuartos(){
        return $this->db->buscar();
    }  
    
    
    public function obterQuarto($where){
        return $this->db->buscar($where, null, null, null);
    } 
    public function alterarQuarto($dados, $where){
        if($this->db->atualizar($dados, $where)){
           // echo '<script> location.href="../view/quartos.php" </script>';
            //die('Cliente alterado');
        }else{
            //echo '<script> location.href="../view/quartos.php" </script>';
            die('Erro ao alterar cliente');
        }
    }    
    
}