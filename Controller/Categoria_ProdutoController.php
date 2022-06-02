<?php


class Categoria_ProdutoController 
{

    public static function index() 
    {
        include 'Model/Categoria_ProdutoModel.php'; 
        
       
        $model = new Categoria_ProdutoModel();
        $model->getAllRows();
        include 'View/modules/Categoria_Produto/ListaCategoria.php';
    }

    
    public static function form()
    {
        include 'Model/Categoria_ProdutoModel.php'; 
        $model = new Categoria_ProdutoModel();
      
        if(isset($_GET['id']))
        $model = $model->getById( (int) $_GET['id']);
        include 'View/modules/Categoria_Produto/FormCategoria.php';
    }


    public static function save() {

        include 'Model/Categoria_ProdutoModel.php'; 
        $Categoria = new Categoria_ProdutoModel();
        $Categoria->id = $_POST['id'];
        $Categoria->descricao = $_POST['descricao'];
     

        $Categoria->save();  

        header("Location: /Categoria_Produto"); 
    }

    public static function delete()
    {
        include 'Model/Categoria_ProdutoModel.php'; 

        $model = new Categoria_ProdutoModel();

        $model->delete( (int) $_GET['id'] );

        header("Location: /Categoria_Produto"); 
    }

}