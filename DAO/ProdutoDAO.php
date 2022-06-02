<?php

class ProdutoDAO
{

    private $conexao;


    function __construct()
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";
        $user = "root";
        $pass = "etecjau";

        $this->conexao = new PDO($dsn, $user, $pass);
    }


    function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO Produto 
                (nome, descricao, preco) 
                VALUES (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->preco);
        
        
        $stmt->execute();      

    }

    public function select()
    {
        $sql = "SELECT * FROM Produto";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    } 

    public function selectById(int $id)
    {
        include_once 'Model/ProdutoModel.php';

        $sql = "SELECT * FROM Produto WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("ProdutoModel"); 
    }

    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE Produto SET descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);
        
        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Produto WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
