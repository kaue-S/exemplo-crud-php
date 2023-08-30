<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produto = lerUmProduto($conexao, $id);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        .container{
            width: 500px;
            text-align: center;
            padding: 15px;
            margin: auto;
            background-color: aqua;
            box-shadow: rgba(0, 0, 0, 0.3) 0 0 10px 1px;
            /* border: 1px solid red; */
        }

        .produtos{
            margin: auto;
            margin-left: 150px;
            text-align: left;
            /* border: 1px solid black; */
            width: 300px
        }

        input, select, textarea, button{
            border-radius: 3px;
            border: none;
        }

        button{
            cursor: pointer;
            text-transform:capitalize;
            font-weight: bold;
            padding: 10px;
            font-size: 13px;
            background-color: greenyellow;
            transition: 0.5s;
        }

        button:hover{
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <h1>Produtos | SELECT/UPDATE</h1>
    <hr>
        <form class="container" action="" method="post">
            <div class="produtos"> 
            <p>
                <label for="nome">Nome: </label>
                <input type="text" value="<?=$produto['nome']?>" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço: </label>
                <input type="number" value="<?=$produto['preco']?>" min="10" max="10000" step="0.01" name="preco" id="preco" required>
            </p>
            <p>
                <label for="qunatidade">Quantidade: </label>
                <input type="number" value="<?=$produto['quantidade']?>" min="1" max="100" name="quantidade" id="quantidade" required>
            </p>
            <p>
                <label for="fabricante">Fabricante: </label>
                <select name="fabricante" value="<?=$produto['fabricante']?>" id="fabricante" required>
                    <option value=""></option>

                    <?php foreach( $listaDeFabricantes as $fabricante ) {
                        // se a chave estrangeira foi identica  a chave primária , ou seja, se o id do fabricante do produto(fabricante_id da tabela produto) for igual ao id do fabricante (coluna id da tabela fabricantes), então coloque "selected" no <option>
                        ?>
                        
                        <option <?php if($produto["fabricante_id"] === $fabricante["id"]) echo "selected"; ?> value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                    <?php } ?>

                </select>
            </p>
            <p>
                <label for="descricao">Descrição:   </label><br>
                <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
            </p>
            </div>
            <p>
            <button type="submit" name="atualizar">atualizar Produto</button>
            </p>
        </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>