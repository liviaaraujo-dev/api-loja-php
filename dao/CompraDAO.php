<?php

require_once './config/Conexao.php';
require_once './model/Compra.php';

class CompraDAO{
    public function create(Compra $compra){
        $sql = 'INSERT INTO compra(idProduto) VALUES(?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $compra->getIdProduto());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM compra';
        $stmt = Conexao::getConn()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return [];
        }
    }

    public function update(Compra $compra){
        $sql = 'UPDATE compra SET idProduto = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $compra->getIdProduto());
        $stmt->bindValue(2, $compra->getId());

        $stmt->execute();
    }

    public function delete($id){
        $sql = 'DELETE FROM compra WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}
