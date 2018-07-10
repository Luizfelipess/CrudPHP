<!DOCTYPE html>
<html>

    <head>
        <!-- Referência da folha de estilos: https://materializecss.com/  !-->
        <link rel="stylesheet" href="css/materialize.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <header>
            <nav>
                <div class="nav-wrapper red darken-4">
                    <a href="" class="brand-logo">&nbsp; CRUD PHP</a>
                </div>
            </nav>
        </header>

        <div class="container"> 
            <center>
                <h5 class="center">Gerenciamento de Produtos</h5> </br>

                <a href="adicionar.php" class="btn">Novo Produto</a> </br>

                <table class="centered">
                    <thead>
                    <tr>
                        <th>Nome do Produto</th>
                        <th>Preço</th>
                        <th>Ação</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php
                            require_once('class/Querys.php');
                            $Query = new Querys();
                            echo $Query->ListaProdutos();
                        ?>
                    </tbody>
                </table>
            </center>
        </div>

    </body>
</html>