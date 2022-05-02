<?php 
if(!isset($_SESSION['carrinho'])){
    die('Você não tem nada no carrinho..');
}
?>
<title>Fechar Pedido</title>

<header>
    <div class="content_top">
        <h2><i class="fa-solid fa-bullhorn"></i> Seu Carrinho</h2>
    </div>
    <div class="option_top">
        <a href="<?= INCLUDE_PATH ?>home">Voltar para Home</a>
    </div>
    <div class="clear"></div>
</header>
   
<section class="foot" >
    <div class="container">
       <table>
           <thead>
               <tr>
               <td>img</td>
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
                    <td><img src="<?= INCLUDE_PATH ?>views/img/<?php echo $item['0'] ?>" ></td>
                    <td><p>R$ <?= $item['1'] ?></p></td>
               </tr>

               <?php }?>
           </tbody>
       </table>
       <p>Valor total da compra: R$<?= number_format(\Models\delivyModel::totalPreco(), 2,',',' '); ?></p>
        
       <div class="form__cliente">
           <?php 
           if(isset($_POST['fazer_pagamento'])){
            if(!isset($_SESSION['carrinho'])){
                die('você não tem item');
            }
            $metodoPagamento = $_POST['opcao_pagamento'];
            $_SESSION['tipo_pagamento'] = $metodoPagamento;
            $_SESSION['total'] = \Models\delivyModel::totalPreco();
            if($metodoPagamento == 'dinheiro'){
                if(!empty($_POST['troco'])){
                    $valorTroco = $_POST['troco'] - \Models\delivyModel::totalPreco();
                    if($valorTroco >= 0){
                        $_SESSION['valor_troco'] = $valorTroco;
                    }else{
                        die('você não especificou um valor correto para o troco.');
                    }
                }else{
                 die("Voce escolheu dinheiro portando precisa especifica o preço!!");   
                }
            }
            echo '<script>alert("o seu pedido foi efetuado com sucesso!")</script>';
            echo '<script>location.href="'.INCLUDE_PATH.'historico"</script>';

           }
           ?>
           <form method="post">
               <p>Escolha o seu método de pagamento!!</p>
               <select name="opcao_pagamento" >
                   <option value="credito">Credito</option>
                   <option value="debito">Debito</option>
                   <option value="dinheiro">Dinheiro</option>
               </select>
               <div style="display: none;" class="troco">
                <p>Troco para quanto?</p>
                <input type="text" name="troco">
            </div>
            <input type="submit" name="fazer_pagamento" value="Fechar pedido">

           </form>
       </div>
    </div>
</section>

<script>
    $('[name=opcao_pagamento]').change(()=>{
        if($('[name=opcao_pagamento]').val() == 'dinheiro'){
            $('.troco').show();
        }else{
            $('.troco').hide();
        }
    })
</script>
</body>
</html>