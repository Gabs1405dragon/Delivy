<?php  
namespace Models;

class delivyModel{
    private static $items = array(array('comida.jpg','20,00','Doces'),array('comida2.jpg','64,00','burgue'),array('comida3.jpg','40,00','Almoço'));

    public static function listarItems(){
        return self::$items;
    }

    public static function addCarrinho($idProduto){
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        }
        $_SESSION['carrinho'][] = $idProduto;

    }

    public static function getItemsCart(){
        return $_SESSION['carrinho'];
    }

    public static function getItem($id){
        return self::$items[$id];
    }

    public static function totalPreco(){
        $valor = 0;
        foreach($_SESSION['carrinho'] as $value){
            $total = self::getItem($value)[1];
            @$valor+=$total;
        };
        return $valor;
    }
}