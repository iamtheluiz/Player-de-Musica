<?php 

	include_once('init/init.php');
	$pdo = $sys->pdo;

	//Verificar os dados
	if(isset($_GET['cd']) and !empty($_GET['cd'])){

		$cd_playlist = $_GET['cd'];

		$sql = "DELETE from tb_playlist_musica where id_playlist = $cd_playlist";
		$query = $pdo->prepare($sql);
		$query->execute();

		if($query->rowCount() > 0){
			$sql = "DELETE from tb_playlist where cd_playlist = $cd_playlist";
			$query = $pdo->prepare($sql);
			$query->execute();

			if($query->rowCount() > 0){
				$sys->redirect("Playlist removida com sucesso!","home.php");
			}else{
				$sys->redirect("Não foi possível remover a playlist!","ver_playlist.php?cd=$cd_playlist");
			}
		}else{
			$sys->redirect("Não foi possível remover as músicas da playlist!","ver_playlist.php?cd=$cd_playlist");
		}

	}else{
		$sys->redirect("Selecione uma playlist para remover!","home.php");
	}