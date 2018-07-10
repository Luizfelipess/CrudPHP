<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <?php 
        //Instância da classe de consultas
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
        </br> <h5 class="center">Insira os dados do produto</h5> </br>
            <div class="panel-body">
                <center>
                    <form class="form-horizontal" role="form" method="POST" action="">  
                        
                        <input type="text" placeholder="Nome do produto" class="form-control" name="nome" required> 

                        <input type="text" placeholder="Preço unitário" class="form-control" name="preco" required>
                        
                        <button type="submit" name="ConfirmaCadastro" class="btn btn-primary red darken-4">Adicionar</button>

                    </form>

                    <?php 
                        if(isset($_REQUEST['ConfirmaCadastro'])){

                            $dados = array(
                                "nome" => $_POST['nome'],    
                                "preco" => $_POST['preco']     
                            );

                            if( $Query->InsereProduto($dados) == true){

                                header('Location: index.php');
                        
                            }
                            else{
                                
                                echo 'Erro ao adicionar!';
                        
                            }

                        }
                    ?>
                </center>
            </div>
        </div>
    </body>
</html>