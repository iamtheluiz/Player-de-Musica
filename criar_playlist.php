<?php 
include('init/init.php');

$pdo = $sys->pdo;

if(isset($_POST['nm_playlist']) and isset($_POST['nm_categoria'])){
	if(!empty($_POST['nm_playlist']) and !empty($_POST['nm_categoria'])){
		$nm_p = $_POST['nm_playlist'];
		$nm_c = $_POST['nm_categoria'];

		$sql = "INSERT into tb_playlist values (null,'$nm_p','$nm_c',DEFAULT)";
		$query = $pdo->prepare($sql);
		$query->execute();
		echo $sql;

		if($query->rowCount() > 0){
			$sys->redirect('Sua playlist foi adicionada!','home.php');
		}else{
			//$sys->redirect('Sua playlist não pôde ser adicionada','home.php');
		}
	}else{
		echo '1';
	}
}else{
	echo '2';
}