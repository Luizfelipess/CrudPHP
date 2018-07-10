<?php

    class connect{

        //Parâmetros de conexão devem ser privados
        private $username = "root";
        private $password = "";
        //Variavel conn terá a função de ser a instancia da classe PDO.
        protected $conn;

        function AbreConexao(){

            //Utilização do tratamento de exceções para tentar conectar com o banco
            try 
            {
                //Atribuo a variavel global $conn, a instancia do PDO.
                $this->conn = new PDO('mysql:host=localhost;dbname=mydb', $this->username, $this->password);
                
                //Retorna como true se a conexão for estabelecida
                return true;
            }
            //Captura e exibe o erro que o PDO pode retornar
            catch(PDOException $e) 
            {

                return 'ERROR: ' . $e->getMessage();

            }
        }

        function FechaConexao(){

            //Usando a conexão PDO, basta setarmos como NULL para encerrar a conexão existente
            $this->conn = null;

        }

    }

?>