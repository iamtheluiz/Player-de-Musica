<meta charset="utf-8">
<title>Login | Playlist</title>
<?php

include('class/Sys.php');
$sys = new Sys;

if(isset($_POST['login']) and isset($_POST['pass'])){
	if(!empty($_POST['login']) and !empty($_POST['pass'])){
		$login = $_POST['login'];
		$pass = $_POST['pass'];

		$sys->login($login, $pass);
	}else{
		$sys->redirect('Não se pode deixar campos vazios!','index.php');
	}
}else{
	$sys->redirect('Faça envio do formulário de login para acessar!','index.php');
}