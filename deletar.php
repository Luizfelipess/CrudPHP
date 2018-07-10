<?php 

    //Não precisa de interface gráfica, portanto não possui elementos HTML.

    require_once('class/Querys.php');
    $Query = new Querys();    

    if( $Query->DeletarProduto($_GET['id']) == true){

        header('Location: index.php');

    }
    else{
        
        echo 'Erro ao excluir!';

    }

?>