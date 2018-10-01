<?php 

include('init/init.php');
$pdo = $sys->pdo;

$musicas = [];
$c = -2;

$sql = "DELETE from tb_musica where 1";
$query = $pdo->prepare($sql);
$query->execute();

if ($dir = opendir('./musicas/')) {
    while (false !== ($file = readdir($dir))) {
        if ($file != "." && $file != "..") {
            /*echo "<i class='material-icons'>audiotrack</i>$file";
            echo "<audio controls>";
            echo "<source src='musicas/"."$file' type='audio/mpeg'>";
            echo "</audio>";*/
            $nome_temp = explode('.',$file);
            $nome = $nome_temp[0];
            $musicas[$c] = [];
            $musicas[$c]['nome'] = $nome;
            $musicas[$c]['src'] = $file;
            echo "<div id='m".$c."' onclick='selecionarMusica(".($c + 1).")'>";
            echo "<i class='material-icons'>audiotrack</i>$file<br>";
            echo "</div>";
            $sql = "INSERT into tb_musica values (null,'$nome','$file',DEFAULT)";
            $query = $pdo->prepare($sql);
            $query->execute();
            echo $sql;
        }
        $c++;
    }
}

$sys->redirect("Suas musicas foram atualizadas!");