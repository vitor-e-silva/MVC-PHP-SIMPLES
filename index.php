<?php 
    require 'vendor/autoload.php';
    use Html\Mvc\Core\Core;

    // Argumentos passados em Array são as funções public

    $mvc = new Core($_GET['route'], 'Html\Mvc\Controller\Controller'); //Primeiro argumento pega a requisição segundo o Controller
    $mvc->Routes('/', ['index']); // Página estática
    $mvc->Routes('/ss/{variavel}', ['paginass']); //Página com argumentos
    $mvc->DispararRotas();