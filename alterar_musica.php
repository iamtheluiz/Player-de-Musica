<title>Alterar Música | Playlist</title>
<?php 

include('init/init.php');

if(isset($_POST['nm_musica']) and isset($_POST['cd_musica']) and isset($_POST['nm_banda'])){
	if(!empty($_POST['nm_musica']) and !empty($_POST['cd_musica']) and !empty($_POST['nm_banda'])){
		$cd = $_POST['cd_musica'];
		$nm = $_POST['nm_musica'];
		$url = $_POST['url_musica'];
		$banda = $_POST['nm_banda'];
		
		$pdo = $sys->pdo;

		$sql = "UPDATE tb_musica set nm_musica = '$nm', url_musica = '$url', nm_banda = '$banda' where cd_musica = $cd";
		$query = $pdo->prepare($sql);
		$query->execute();

		if($query->rowCount() > 0){
			$sys->redirect('Sua musica foi alterada','editar_musicas.php');
		}else{
			$sys->redirect('Sua mjusica não pode ser alterada','editar_musicas.php');
		}
	}else{
		$sys->redirect('Selecione uma musica para alterar','editar_musicas.php');
	}
}else{
	$sys->redirect('Selecione uma musica para alterar','editar_musicas.php');
}