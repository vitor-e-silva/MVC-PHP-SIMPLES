<?php
    namespace Html\Mvc\Controller;

    class Controller{
        public function index()
        {
            //Coloque a sua view
            echo 'Página Estática';
        }
        public function paginass($variavel)
        {
             //Coloque a sua view
           echo 'Variável dinâmica: '.$variavel['variavel'];
        }
        public function paginaerro()
        {
             //Coloque a sua view
           echo 'Erro 404 página não encontrada.';
        }
    }