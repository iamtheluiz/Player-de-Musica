<?php 

class Sys{
	//Atributos 
	private $pdo;

	//Métodos 
	public function __construct(){
		$this->pdo = $this->db_connect();
	}
	public function db_connect()
	{
		$pdo = new PDO('mysql:host=localhost;dbname=db_player;port=3307','root','usbw');

		return $pdo;
	}
	public function login($login,$pass)
	{		
		$cript = $this->encript_pass($pass);
			
		$sql = "SELECT * from tb_login where tx_login = '$login' and tx_pass = '$cript'";
		$pdo = $this->pdo;

		$query = $pdo->prepare($sql);
		$query->execute();
		echo $sql;

		if($query->rowCount() > 0){
			$row = $query->fetch(PDO::FETCH_ASSOC);
			session_start();
			$_SESSION['logged_in'] = true;
			$_SESSION['nm_user'] = $row['nm_user'];
			$_SESSION['cd_user'] = $row['cd_user'];

			$this->redirect('Bem-vindo '.$row['nm_user'].'!','home.php');
 		}else{
 			$this->redirect('Insira um login válido!','index.php');
		}
	}
	public function logout()
	{
		session_unset();
		session_destroy();

		$this->redirect('Você saiu de sua conta!','index.php');
	}
	public function valid_login()
	{
		if($_SESSION['logged_in'] == true){

		}else{
			$this->redirect('Você precisa logar para acessar essa pagina!','home.php');
		}
	}

	public function listar_musicas()
	{
		# code...
	}
	public function encript_pass($pass)
	{
		$md5 = md5($pass);
		$sha = sha1($md5);

		return $sha;
	}
	public function redirect($msg, $pag){
		echo "<script>alert('$msg'); window.location = '$pag';</script>";
	}
	//Métodos Especiais
	
}