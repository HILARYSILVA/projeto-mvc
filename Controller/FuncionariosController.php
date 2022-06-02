<?php


class FuncionariosController 
{

    public static function index() 
    {
        include 'Model/FuncionariosModel.php'; 
        
       
        $model = new FuncionariosModel();
        $model->getAllRows();
        include 'View/modules/Funcionarios/ListaFuncionarios.php';
    }

    
    public static function form()
    {
        include 'Model/FuncionariosModel.php'; 
        $model = new FuncionariosModel();
      
        if(isset($_GET['id']))
        $model = $model->getById( (int) $_GET['id']);
        include 'View/modules/Funcionarios/FormFuncionarios.php';
    }


    public static function save() {

        include 'Model/FuncionariosModel.php'; 
        $Funcionarios = new FuncionariosModel();
        $Funcionarios->id = $_POST['id'];
        $Funcionarios->nome = $_POST['nome'];
        $Funcionarios->cargo = $_POST['cargo'];
      
        $Funcionarios->save();  

        header("Location: /Funcionarios"); 
    }

    public static function delete()
    {
        include 'Model/FuncionariosModel.php'; 

        $model = new FuncionariosModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /Funcionarios"); 
    }

}