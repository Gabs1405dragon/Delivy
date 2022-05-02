<?php  
namespace Controllers;

class delivyController{
    public function index(){
        $url = (isset($_GET['url']) ? $_GET['url'] : 'home');
        $class = explode('/',$url)[0];
        if(file_exists('views/'.$class.'.php')){
            include('views/templates/header.php');
           
            include('views/'.$class.'.php');
            $this->validarCarrinho();
        }else{
            die('Esse arquivo não existe!!!');
        }
    }

    public function validarCarrinho(){
        if(isset($_GET['addCart'])){
            
            $idProduto = (int)$_GET['addCart'];
            \Models\delivyModel::addCarrinho($idProduto);
            echo '<script>alert("adicionando no carrinho")</script>';
        }
    }
}