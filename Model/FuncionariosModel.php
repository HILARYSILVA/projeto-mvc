<?php

class FuncionariosModel
{
   
    public $id, $nome, $cargo;
   
    public $rows;

   
    public function save()
    {
        include 'DAO/FuncionariosDAO.php';

        $dao = new FuncionariosDAO();

        if(empty($this->id))
        {
           
            $dao->insert($this);
        } 
        else 
        {
            $dao->update($this);
      
        }
    }
        public function getAllRows()
        {
            include 'DAO/FuncionariosDAO.php';
            $dao = new FuncionariosDAO();
            $this->rows = $dao->select();
        }


        public function getById(int $id)
        {
            include 'DAO/FuncionariosDAO.php';

            $dao = new FuncionariosDAO();

            $obj = $dao->selectById($id);

            return ($obj) ? $obj : new FuncionariosModel();
        }

        public function delete(int $id)
    {
        include 'DAO/FuncionariosDAO.php'; 

        $dao = new FuncionariosDAO();

        $dao->delete($id);
    }

    }