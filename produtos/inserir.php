<?php
    require_once "../src/funcoes-fabricantes.php";
    require_once "../src/funcoes-produtos.php";
   $fabricantes = lerFabricantes($conexao);

   if(isset($_POST['inserir'])) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);

    $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT);

    $fabricante_id = filter_input(INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT);

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    inserirProduto($conexao, $nome, $preco, $quantidade, $fabricante_id, $descricao);

    header("location:visualizar.php");
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
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
            text-align: left;
            /* border: 1px solid black; */
            width: 250px
        }

        input, select, textarea, button{
            border-radius: 3px;
            border: none;
        }
    </style>
</head>
<body>
    <h1>Produtos | INSERT</h1>
    <hr>
        <form class="container" action="" method="post">
            <div class="produtos">
            <p>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
            </p>
            <p>
                <label for="qunatidade">Quantidade:</label>
                <input type="number" min="1" max="100" name="quantidade" id="quantidade" required>
            </p>
            <p>
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                    <option value="">-<?php
                        foreach($fabricantes as $fabricante){?>
                        <option value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                    <?php
                    }
                    ?></option>
                </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label><br>
                <textarea name="descricao" id="descricao" cols="30" rows="3"></textarea>
            </p>
            </div>
            <p>
            <button type="submit" name="inserir">Inserir Produto</button>
            </p>
        </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>