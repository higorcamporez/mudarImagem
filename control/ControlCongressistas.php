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


class ControlCongressista {
    
    public $db;
    
    public function __construct() {
        $this->db = new MySQLModel();
        $this->db->_tabela = "congressista";
    }
    

    public function cadastrarCongressista($dados){
        if($this->db->inserir($dados)){
            
           echo '<script> location.href="../view/index.php" </script>';
        }else{
            die('Quarto NAO cadastrado');
        }
    }

    public function excluirCongressista($where){
        if($this->db->deletar($where)){
            echo '<script> location.href="../view/index.php" </script>';
            die('Quarto excluido');
        }else{
            '<script> location.href="../view/idex.php" </script>';
            die('Erro ao excluir cliente');
        }

    }

    public function obterCongressistas(){
        return $this->db->buscar();
    }  
    
    public function obterCongressista($where){
        return $this->db->buscar($where, null, null, null);
    } 
    public function alterarCongressista($dados, $where){
        if($this->db->atualizar($dados, $where)){
            echo '<script> location.href="../view/admin.php" </script>';
            die('Cliente alterado');
        }else{
            echo '<script> location.href="../view/admin.php" </script>';
            die('Erro ao alterar cliente');
        }
    }    
    
}