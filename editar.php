<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <?php 
        require_once('class/Querys.php');
        $Query = new Querys();    
    ?>

    <body>

        <header>
            <nav>
                <div class="nav-wrapper red darken-4">
                    <a href="index.php" class="brand-logo">&nbsp; CRUD PHP</a>
                </div>
            </nav>
        </header>

        <div class="container">
        </br> <h5 class="center">Edite os dados do produto</h5> </br>
            <div class="panel-body">
                <center>
                    <form class="form-horizontal" role="form" method="POST" action="">  
                        
                        <?php
                            //Método captura dados do produto
                            $Query->ListaProduto($_GET['id']);
                        ?>

                        <!-- Inserimos o ID do produto em um input do tipo "Hidden", que não aparece para o usuário !-->
                        <!-- Trocando o type para text, uma caixa de texto com o ID será exibido. !-->
                        <input value="<?php echo $_GET['id']; ?>" type="hidden" name="id">
                        <input value="<?php echo $Query->nome; ?>" type="text" placeholder="Nome do produto" class="form-control" name="nome" required> 
                        <input value="<?php echo $Query->preco; ?>" type="text" placeholder="Preço unitário" class="form-control" name="preco" required>
                        
                        <button type="submit" name="EditaCadastro" class="btn btn-primary">Editar</button>

                    </form>
                </center>
            </div>
        </div>

        <?php 

            if(isset($_REQUEST['EditaCadastro'])){

                $dados = array(
                    "id" => $_POST['id'],
                    "nome" => $_POST['nome'],    
                    "preco" => $_POST['preco']     
                );

                if( $Query->EditaProduto($dados) == true){

                    header('Location: index.php');

                }
                else{
                    
                    echo 'Erro ao atualizar!';

                }

            }

        ?>

    </body>
</html>