<?php
    require_once "conecta.php";
    function lerProdutos(PDO $conexao){
        // $sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";
        $sql = "SELECT 
            produtos.id, 
            produtos.nome AS produto,
            produtos.preco,
            produtos.quantidade, 
            fabricantes.nome AS fabricante
         FROM produtos INNER JOIN fabricantes ON produtos.fabricante_id = fabricantes.id ORDER BY produto";
        
        try {
            $consulta = $conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            die("Erro ao carregar produtos: ".$erro->getMessage());
        }
        return $resultado;
            // PREPARE...
            // EXECUTE...
            // GERAR RESULTADO COMO ARRAY
        // RETORNAR O RESULTADO DA ARRAY
    }
?>