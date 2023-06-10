<?php

use PSpell\Config;

require_once 'config/Conexao.php';
require_once 'model/Produto.php';

class ProdutoDAO{

    public function create(Produto $produto){
        $sql = 'INSERT INTO produto(nome, descricao, preco) VALUES (?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->bindValue(3, $produto->getPreco());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM produto';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return [];
        }
    }

    public function update(Produto $produto){
        $sql = 'UPDATE produto SET nome = ?, descricao = ?, preco = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->bindValue(3, $produto->getPreco());
        $stmt->bindValue(4, $produto->getId());

        $stmt->execute();
    }

    public function delete($id){
        $sql = 'DELETE FROM produto WHERE id = ?';
        $stmp = Conexao::getConn()->prepare($sql);
        $stmp->bindValue(1, $id);

        $stmp->execute();

    }


}
