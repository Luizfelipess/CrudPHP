<?php
	//Faz o requerimento da classe de conexão
	require_once('Conexao.php');
	
	//Classe Querys extende da classe connect, assim, obtem todos os métodos criados na mesma.
	class Querys extends connect {

		/*
			Após chamarmos o método AbreConexao, a variavel global conn será a instancia de nossa conexão com o PDO.
			Portanto, a referenciamos e em seguida usamos as funções do PDO.
			Exemplo:
			Rerenciamos a variável   : $this->conn
			Chamamos a função do PDO : ->prepare , ->execute , etc...
		*/


		//Lista todos os produtos
		function ListaProdutos(){

			$this->AbreConexao();
				$sql = $this->conn->prepare("SELECT * FROM `produtos` ORDER BY `nomeproduto` ASC");
				$sql->execute();
				$cont = $sql->rowCount();
				if($cont > 0){

					$retorno = "";
						while($linha = $sql->fetch()){

							/*
								Exibimos nesse array os produtos da aplicação.
								Referenciamos o link através do ID do produto, exemplo:
								Escopo   : href="Página de referencia?nome da variavel=valor da variavel"
								Produção : href="editar.php?id=1"

								Desta forma, enviamos a variavel "id" com o valor "1" através do método GET definido em nosso FORM.

							*/
							$retorno .= '<tr>';
								$retorno .= '<td>'.$linha['nomeproduto'].'</td>';
								$retorno .= '<td>'.$linha['precounitario'].'</td>';
								$retorno .= '<td>
												<a class="btn indigo darken-3" href="editar.php?id='.$linha['produtoID'].'">Editar</a> 
												<a class="btn red darken-4" href="deletar.php?id='.$linha['produtoID'].'">Deletar</a> 
											 </td>';
							$retorno .= '</tr>';
							
						}
					return $retorno;
				}
				else{
					return "Não foram encontrados produtos";
				}
			$this->FechaConexao();

		}

		//Recebe dados de um produto através de seu ID
		function ListaProduto($id){
			$this->AbreConexao();
				$sql = $this->conn->prepare("SELECT * FROM `produtos` WHERE `produtoID` = '$id'");
				$sql->execute();
				$cont = $sql->rowCount();
				if($cont > 0){
					while($linha = $sql->fetch()){

						$this->nome = $linha['nomeproduto'];
						$this->preco = $linha['precounitario'];
						
					}
				}
				else{
					return "Não foram encontrados produtos";
				}
			$this->FechaConexao();
		}

		//Insere novo produto no banco
		function InsereProduto($dados){
			$this->AbreConexao();
				$sql = $this->conn->prepare("INSERT INTO `produtos` (nomeproduto, precounitario) 
												    VALUES ('".$dados['nome']."', '".$dados['preco']."') ");
				$sql->execute();
				$cont = $sql->rowCount();

				if($cont > 0){
					return true;
				}
				else{
					return false;
				}

			$this->FechaConexao();
		}

		//Edita dados do produto
		function EditaProduto($dados){

			$this->AbreConexao();

				$sql = $this->conn->prepare("	UPDATE `produtos` set
												`nomeproduto` = '".$dados['nome']."' ,
												`precounitario` = '".$dados['preco']."' 
												WHERE `produtoID` = '".$dados['id']."'
											");
				$sql->execute();
				$cont = $sql->rowCount();

				if($cont > 0){
					return true;
				}
				else{
					return false;
				}

			$this->FechaConexao();

		}

		//Deleta produto
		function DeletarProduto($id){

			$this->AbreConexao();

				$sql = $this->conn->prepare("DELETE FROM `produtos` WHERE `produtoID` = '$id' ");
				$sql->execute();
				$cont = $sql->rowCount();
				if($cont > 0){
					return true;
				}
				else{
					return false;
				}

			$this->FechaConexao();
		
		}

	}
	
?>