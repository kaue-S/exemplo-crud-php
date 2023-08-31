<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$produto = lerUmProduto($conexao, $id);

if(isset($_POST['atualizar'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $preco = filter_input(
        INPUT_POST, "preco", 
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(
        INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT
    );

    // Pegaremos o value, ou seja, o valor do id do fabricante
    $fabricanteId = filter_input(
        INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT
    );

    $descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);

    atualizarProduto(
        $conexao, $id, $nome, $preco, $quantidade, $descricao, $fabricanteId
    );

    header("location:visualizar.php");
}
?>
<!DOCTYPE html>
<html lang="en">
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
<div class="container">
    <form action="" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
        </p>
        <p>
            <label for="preco">Preço:</label>
            <input value="<?=$produto['preco']?>"
            type="number" min="10" max="10000" step="0.01"
             name="preco" id="preco" required>
        </p>
        <p>
            <label for="quantidade">Quantidade:</label>
            <input value="<?=$produto['quantidade']?>"
            type="number" min="1" max="100"
             name="quantidade" id="quantidade" required>
        </p>
        <p>
            <label for="fabricante">Fabricante:</label>
            <select name="fabricante" id="fabricante" required>
                <option value=""></option>
                
                <?php foreach( $listaDeFabricantes as $fabricante ) { 
                    /* Lógica/Algoritmo da seleção do fabricante
                    Se a chave estrangeira for idêntica à chave primária, ou seja, se o id do fabricante do produto (coluna fabricante_id da tabela produtos)
                    for igual ao id do fabricante (coluna id da tabela fabricantes), então coloque o atributo "selected" no
                    <option> */
                ?>        
                    <option 
<?php 
// chave estrangeira  ===  chave primaria
if($produto["fabricante_id"] === $fabricante["id"]) echo " selected ";
?>
                    value="<?=$fabricante['id']?>">
                        <?=$fabricante['nome']?>
                    </option>
                <?php } ?>


            </select>
        </p>
        <p>
            <label for="descricao">Descrição:</label> <br>
            <textarea name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?></textarea>
        </p>
        <button type="submit" name="atualizar">Atualizar produto</button>
    </form>
    </div>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
    
</body>
</html>