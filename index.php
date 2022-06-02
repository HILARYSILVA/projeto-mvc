<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//echo $uri_parse;
//echo "<hr />";

include 'Controller/PessoaController.php';
include 'Controller/ProdutoController.php';
include 'Controller/Categoria_ProdutoController.php';
include 'Controller/FuncionariosController.php';
switch ($uri_parse) {
      case '/Pessoa':
            PessoaController::index();
            break;

      case '/Pessoa/form':
            PessoaController::form();
            break;

      case '/Pessoa/save':
            PessoaController::save();
            break;

      case '/Pessoa/delete':
            PessoaController::delete();
            break;

      case '/Categoria_Produto':
            Categoria_ProdutoController::index();
            break;

      case '/Categoria_Produto/form':
            Categoria_ProdutoController::form();
            break;

      case '/Categoria_Produto/save':
            Categoria_ProdutoController::save();
            break;

      case '/Categoria_Produto/delete':
            Categoria_ProdutoController::delete();
            break;

      case '/Funcionarios':
            FuncionariosController::index();
            break;

      case '/Funcionarios/form':
            FuncionariosController::form();
            break;

      case '/Funcionarios/save':
            FuncionariosController::save();
            break;

      case '/Funcionarios/delete':
            FuncionariosController::delete();
            break;

      case '/Produto':
            ProdutoController::index();
            break;

      case '/Produto/form':
            ProdutoController::form();
            break;

      case '/Produto/save':
            ProdutoController::save();
            break;

      case '/Produto/delete':
            ProdutoController::delete();
            break;
}
