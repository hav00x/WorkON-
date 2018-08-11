<?php

class db{

	//Qual o host, o usuário, a senha e o banco de dados para fazer a conexão do BD com o PHP
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $database = 'root2';

	public function connect(){

	//cria a conexão	
		$conn = new mysqli($this->host, $this->usuario, $this->senha, $this->database);

	//ajustar o charset de comunicação entre a aplicação e o banco de dados
		mysqli_set_charset($conn, 'utf8');

	//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo 'houve um erro ao tentar se conectar com o banco de dados MYSQL: '.mysqli_connect_error();
		}

		return $conn;
	}

}

?>