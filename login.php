<?php

include('class/Sys.php');
$sys = new Sys;

if(isset($_POST['login']) and isset($_POST['pass'])){
	if(!empty($_POST['login']) and !empty($_POST['pass'])){
		$login = $_POST['login'];
		$pass = $_POST['pass'];

		$sys->login($login, $pass);
	}else{
		$sys->redirect('index.php','Não se pode deixar campos vazios!');
	}
}else{
	$sys->redirect('index.php','Faça envio do formulário de login para acessar!');
}