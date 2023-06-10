<?php

class Produto{
    private $id;
    private $nome;
    private $descricao;
    private $preco;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    {
        return $this->preco;
    }
    
    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}


?>
