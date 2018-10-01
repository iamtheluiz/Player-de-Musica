<?php 

	include_once('init/init.php');
	$pdo = $sys->pdo;

	//Verificar os dados
	if(isset($_POST['cd_playlist']) and isset($_POST['cd_musica']) and !empty($_POST['cd_playlist']) and !empty($_POST['cd_musica'])){

		$cd_playlist = $_POST['cd_playlist'];
		$cd_musica = $_POST['cd_musica'];

		$sql = "INSERT into tb_playlist_musica values (null,'$cd_playlist','$cd_musica')";
		$query = $pdo->prepare($sql);
		$query->execute();

		if($query->rowCount() > 0){
			$sys->redirect("Música adicionada com sucesso!","ver_playlist.php?cd=$cd_playlist");
		}else{
			$sys->redirect("Não foi possível adicionar a música!","ver_playlist.php?cd=$cd_playlist");
		}

	}else{
		$sys->redirect("Selecione uma música para adicionar!","home.php");
	}