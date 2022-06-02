<?php

class PessoaDAO
{
 
    private $conexao;


    function __construct() 
    {
        
        $dsn = "mysql:host=localhost:3307;dbname=db_mvc";
        $user = "root";
        $pass = "etecjau";
        
        
        $this->conexao = new PDO($dsn, $user, $pass);
    }


    
    function insert(PessoaModel $model) 
    {
        
        $sql = "INSERT INTO Pessoa 
                (nome, rg, cpf, data_nascimento, email, telefone, endereco) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);

        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        
       
        $stmt->execute();      

    }

    public function update(PessoaModel $model)
    {
        $sql = "UPDATE Pessoa SET nome=?, rg=?, cpf=?, data_nascimento=?, email=?, telefone=?, endereco=? WHERE id=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);
        $stmt->bindValue(8, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM Pessoa";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    } 

    public function selectById(int $id)
    {
        include_once 'Model/PessoaModel.php';

        $sql = "SELECT * FROM Pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel"); 
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM Pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
