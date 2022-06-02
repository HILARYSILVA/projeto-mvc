<?php


class PessoaController 
{

    public static function index() 
    {
        include 'Model/PessoaModel.php'; 
        
       
        $model = new PessoaModel();
        $model->getAllRows();
        include 'View/modules/Pessoa/ListaPessoa.php';
    }

    
    public static function form()
    {
        include 'Model/PessoaModel.php'; 
        $model = new PessoaModel();
      
        if(isset($_GET['id']))
        $model = $model->getById( (int) $_GET['id']);
        include 'View/modules/Pessoa/FormPessoa.php';
    }


    public static function save() {

        include 'Model/PessoaModel.php'; 
        $Pessoa = new PessoaModel();
        $Pessoa->id = $_POST['id'];
        $Pessoa->nome = $_POST['nome'];
        $Pessoa->rg = $_POST['rg'];
        $Pessoa->cpf = $_POST['cpf'];
        $Pessoa->data_nascimento = $_POST['data_nascimento'];
        $Pessoa->email = $_POST['email'];
        $Pessoa->telefone = $_POST['telefone'];
        $Pessoa->endereco = $_POST['endereco'];

        $Pessoa->save();  

        header("Location: /Pessoa"); 
    }

    public static function delete()
    {
        include 'Model/PessoaModel.php'; 

        $model = new PessoaModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /Pessoa"); 
    }

}