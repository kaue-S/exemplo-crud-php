<?php
    require_once "conecta.php";
    function lerProdutos(PDO $conexao){
        $sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";
        
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