<?php

class FuncionariosDAO
{
 
    private $conexao;


    function __construct() 
    {
        
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";
        $user = "root";
        $pass = "etecjau";
        
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }


    
    function insert(FuncionariosModel $model) 
    {
        
        $sql = "INSERT INTO funcionarios
                (nome,cargo) 
                VALUES (?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cargo);
      
        
       
        $stmt->execute();      

    }

    public function update(FuncionariosModel $model)
    {
        $sql = "UPDATE funcionarios SET nome=?, cargo=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cargo);
        $stmt->bindValue(3, $model->id);
   
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Funcionarios";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    } 

    public function selectById(int $id)
    {
        include_once 'Model/FuncionariosModel.php';

        $sql = "SELECT * FROM Funcionarios WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("FuncionariosModel"); 
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Funcionarios WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
