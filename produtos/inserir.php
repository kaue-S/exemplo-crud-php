<?php
    require_once "../src/funcoes-fabricantes.php";
   $fabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
</head>
<body>
    <h1>Produtos | INSERT</h1>
    <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome</label>
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
                    <option value=""><?php
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
            <p>
            <button type="submit" name="inserir">Inserir Produto</button>
            </p>
        </form>
    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>