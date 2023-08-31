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
        *{box-sizing: border-box; text-decoration: none; }

        .produtos{
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            width: 80%;
            margin: auto;
        }

        .produto{
            background-color: hsla(350, 73%, 47%, 1);
            background: linear-gradient(90deg, hsla(350, 73%, 47%, 1) 0%, hsla(230, 53%, 75%, 1) 0%);
            background: -moz-linear-gradient(90deg, hsla(350, 73%, 47%, 1) 0%, hsla(230, 53%, 75%, 1) 0%);
            background: -webkit-linear-gradient(90deg, hsla(350, 73%, 47%, 1) 0%, hsla(230, 53%, 75%, 1) 0%);
            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#cf203e", endColorstr="#9DA8E1", GradientType=1 );;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px 1px;
        }

        h3{
            text-align: center;background-color: blue;
        }
        #edit{
            padding: 6px 10px;
            border-radius: 7px;
            color: black;
            background-color: yellow;
            transform: scale(1.5);
            transition: 1s;
        }

        #exc{
            background-color: red;
            padding: 6px 10px;
            border-radius: 8px;
            color: white;
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
            <h3><?=$produto['produto']?></h3>
            <h4><?=$produto['fabricante']?></h4>
            <p><b>Preço: <?=formataPreco($produto["preco"])?></b></p>
            <p><b>Quantidade: <?=$produto['quantidade']?></b></p>
            <p><b>Total:<?= formataPreco($produto['preco'] * $produto['quantidade'])?></b></p>

            <hr>
            <p>
                <a id="edit" href="atualizar.php?id=<?=$produto["id"]?>">Editar</a> | <a class="excluir" id="exc" href="excluir.php?id=<?=$produto["id"]?>">Excluir</a>
            </p>
        </article>
        <?php }?>
    </div>
    <script src="../js/confirma-exclusao.js"></script>
</body>
</html>     