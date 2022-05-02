<title>Home</title>

<header>
    <div class="content_top">
        <h2><i class="fa-solid fa-bullhorn"></i> Faça seu pedido conosco</h2>
    </div>
    <div class="option_top">
        <a href="<?= INCLUDE_PATH ?>fechar_pedido">Fechar pedido</a>
    </div>
    <div class="clear"></div>
</header>
   
<section class="foot" >
    <div class="container">
        <?php 
        $sushis = \Models\delivyModel::listarItems();
        foreach($sushis as $key => $value){ ?>
        <div class="wrap__foot">
            <div class="single__foot">
                <div class="img__foot"><img src="<?= INCLUDE_PATH ?>views/img/<?php echo $value['0'] ?>" ></div>
                <div class="content__foot">
                    <p>R$<?= $value['1'] ?></p>
                    <a href="?addCart=<?= $key ?>">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="clear"></div>
    </div>
</section>

</body>
</html>