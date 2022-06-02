<?php

class Categoria_ProdutoDAO
{
 
    private $conexao;


    function __construct() 
    {
        
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";
        $user = "root";
        $pass = "etecjau";
        
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }


    
    function insert(Categoria_ProdutoModel $model) 
    {
        
        $sql = "INSERT INTO Categoria
                (descricao) 
                VALUES (?)";
        
        $stmt = $this->conexao->prepare($sql);

        
       
        $stmt->bindValue(1, $model->descricao);
        
        
       
        $stmt->execute();      

    }

    public function update(Categoria_ProdutoModel $model)
    {
        $sql = "UPDATE Categoria SET descricao=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->id);
        
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Categoria";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    } 

    public function selectById(int $id)
    {
        include_once 'Model/Categoria_ProdutoModel.php';

        $sql = "SELECT * FROM Categoria WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Categoria_ProdutoModel"); 
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Categoria WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
