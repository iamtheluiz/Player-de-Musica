<meta charset="utf-8">
<title>Cadastro | Playlist</title>
<?php

include('class/Sys.php');
$sys = new Sys;
$pdo = $sys->pdo;

if(isset($_POST['nm_login']) and isset($_POST['login']) and isset($_POST['pass']) and isset($_POST['pass_c'])){
	if(!empty($_POST['nm_login']) and !empty($_POST['login']) and !empty($_POST['pass']) and !empty($_POST['pass_c'])){

		$nm_login = $_POST['nm_login'];
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		$pass_c = $_POST['pass_c'];

		//Verifica se já existe um usuário com o mesmo nome
		$sql_v = "SELECT * from tb_login where tx_login = $login";
		$query_v = $pdo->prepare($sql_v);
		$query_v->execute();

		if($query_v->rowCount() > 0){
			//Já existe um usuário com esse login
			$sys->redirect("Já existe um usuário com esse login","index.php");
			exit();
		}else{

			//Verifica se as senhas são iguais!
			if($pass_c != $pass){
				$sys->redirect("As senhas não correspondem!","index.php");
				exit();
			}else{

				//Encripta a senha
				$pass = $sys->encript_pass($pass_c);

				$sql = "INSERT into tb_login values (null,'$nm_login','$login','$pass')";
				$query = $pdo->prepare($sql);
				$query->execute();

				if($query->rowCount() > 0){

					//Usuário cadastrado com sucesso!
					$sys->redirect("Usuário cadastrado com sucesso!","index.php");

				}else{
					$sys->redirect("Não foi possível cadastrar o usuário!","index.php");
				}

			}

		}
		
	}else{
		$sys->redirect('Não se pode deixar campos vazios!','index.php');
	}
}else{
	$sys->redirect('Faça envio do formulário de cadastro para acessar!','index.php');
}