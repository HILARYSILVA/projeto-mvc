<?php

class ProdutoController 
{
    public static function index() 
    {
        include 'Model/ProdutoModel.php'; 
              
        $model = new ProdutoModel();
        $model->getAllRows();
        include 'View/modules/Produto/ProdutoLista.php';
    }

    public static function form()
    {
        include 'Model/ProdutoModel.php'; 
              
        $model = new ProdutoModel();
        if(isset($_GET['id']))
            $model = $model->getById( (int) $_GET['id']);

        include 'View/modules/Produto/ProdutoCadastro.php';
    }

    public static function save() 
    {

        include 'Model/ProdutoModel.php'; 


        $Produto = new ProdutoModel();
        $Produto->id = $_POST['id'];
        $Produto->nome = $_POST['nome'];
        $Produto->descricao = $_POST['descricao'];
        $Produto->preco = $_POST['preco'];
        
        $Produto->save(); 

        header("Location: /Produto"); 
    }
    
    public static function delete(){
        include 'Model/ProdutoModel.php'; 

        $model = new ProdutoModel();

        $model->delete( (int) $_GET['id'] ); 

        header("Location: /Produto"); 
    }
}