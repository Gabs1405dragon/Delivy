
<div class="container">
    <?php 
if(!isset($_SESSION['tipo_pagamento'])){
    die('Você não tem nada no historico de compra..');
}
echo '<h2>O método de pagamento foi de "'.ucfirst($_SESSION['tipo_pagamento']).'"</h2>';
echo '<h2>Total de R$'.$_SESSION['total'].'</h2>';
if($_SESSION['tipo_pagamento'] == 'dinheiro'){
    echo '<h2>Troco :R$'.number_format($_SESSION['valor_troco'],2,',',' ') .'<h2>';
}
?>
       <table>
           <thead>
               <tr>
               <td>Nome</td>
               <td>Preço</td>    
               </tr>
           </thead>
           <tbody>
               <?php  
               $carrinhoItems = \Models\delivyModel::getItemsCart();
               foreach($carrinhoItems as $key => $value){
                   $item = \Models\delivyModel::getItem($value);
               ?>
               <tr>
                    <td><p><?php echo $item['2'] ?></p></td>
                    <td><p>R$ <?= $item['1'] ?></p></td>
               </tr>

               <?php }?>
           </tbody>
       </table>
       <a href="historico?resertar">Pedido entregue</a>
        <?php  
        if(isset($_GET['resertar'])){
            session_destroy();
            echo '<script>location.href="'.INCLUDE_PATH.'home"</script>';
        }
        ?>
       
       </div>
    </div>