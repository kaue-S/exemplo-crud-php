<?php
    require_once "../src/funcoes-produtos.php";
    $listaDeProdutos = lerProdutos($conexao);
    
    require_once "../src/funcoes-utilitarias.php";
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{box-sizing: border-box;}

        .produtos{
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            width: 80%;
            margin: auto;
        }

        .produto{
            background-color: aqua;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px 1px;
        }
    </style>
</head>
<body>
    <h1>Produtos | SELECT - <a href="../index.php">Home</a></h1>

    <hr>
    <h2>Lendo e carregando todos os produtos</h2>

    <p><a href="inserir.php">Inserir novo produto</a></p>

    <div class="produtos">

    <?php foreach( $listaDeProdutos as $produto ){ ?>
        <article class="produto">
            <h3><?=$produto['nome']?></h3>
            <p><b>Preço: <?=formataPreco($produto["preco"])?></b></p>
            <p><b>Quantidade: <?=$produto['quantidade']?></b></p>
        </article>
        <?php }?>
    </div>
</body>
</html>