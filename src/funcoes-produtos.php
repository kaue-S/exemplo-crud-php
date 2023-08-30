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

    function inserirProduto(
        PDO $conexao, string $nome, float $preco, int $quantidade, int $fabricante_id, string $descricao):void {
        $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES (:nome, :preco, :quantidade, :descricao, :fabricanteId)";

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue("nome", $nome, PDO::PARAM_STR);
            $consulta->bindValue("preco", $preco, PDO::PARAM_STR);
            $consulta->bindValue("quantidade", $quantidade, PDO::PARAM_STR);
            $consulta->bindValue("descricao", $descricao, PDO::PARAM_STR);
            $consulta->bindValue("fabricanteId", $fabricante_id, PDO::PARAM_INT);

            $consulta->execute();
        } catch (Exception $erro) {
            die("Erro ao Inserir: ".$erro->getMessage());
        }

    }

    // atualizar produto
    
    function lerUmProduto(PDO $conexao, int $id):array {
    $sql = "SELECT * FROM produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao atualizar: " . $erro->getMessage());
    }
    return $resultado;
}
?>