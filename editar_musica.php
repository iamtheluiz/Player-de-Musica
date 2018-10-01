<?php include('init/init.php'); 
if(isset($_GET['cd'])){
    if(!empty($_GET['cd'])){
        $cd = $_GET['cd'];
    }else{
        $sys->redirect('Selecione uma musica para entrar nessa página','editar_musicas.php');
    }
}else{   
    $sys->redirect('Selecione uma musica para entrar nessa página','editar_musicas.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/material_icons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        <title>Editar Música | Playlist</title>
    </head>
    <body>
        <div class="content">
            <div class="row">
                <!-- audiotrack, headset, delete, folder, play_circle_filled -->
                <?php
                    include_once('components/menu.php');
                ?>
                <div class="col s12 blue lighten-1 teste">
                    <?php 
                        $pdo = $sys->pdo;

                        $sql = "SELECT * from tb_musica where cd_musica = $cd";
                        $query = $pdo->prepare($sql);
                        $query->execute();

                        if($query->rowCount() > 0){
                            $row = $query->fetch(PDO::FETCH_OBJ);
                        }else{
                            $sys->redirect('Essa musica não existe!','editar_musicas.php');
                        }
                    ?>
                    <form method="post" action="alterar_musica.php">
                        <div class="col s10 offset-s1 white" style="margin-top:20px;">
                            <div class="col s12 center center-align">
                                <h3>Editar Musica</h3>
                                <input type="hidden" name="cd_musica" id="cd_musica" value="<?php echo $row->cd_musica; ?>">
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="nm_musica" id="nm_musica" value="<?php echo $row->nm_musica; ?>">
                                <label for="nm_musica">Nome</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="nm_banda" id="nm_banda" value="<?php echo $row->nm_banda; ?>">
                                <label for="nm_banda">Banda</label>
                            </div>
                            <div class="input-field col s12">
                                <input type="text" name="url_musica" id="url_musica" value="<?php echo $row->url_musica; ?>">
                                <label for="url_musica">URL</label>
                            </div>
                            <div class="input-field col s12 center center-align">
                                <button class="btn" type="submit">Alterar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="modal1" class="modal modal-fixed-footer">
                    <div class="modal-content">
                        <form action="criar_playlist.php" method="post">
                            <h4>Playlist</h4>
                            <div class="input-field">
                                <input type="text" name="nm_playlist">
                                <label for="nm_playlist">Nome</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="nm_categoria">
                                <label for="nm_categoria">Categoria</label>
                            </div>
                            <div class="input-field col s12 center center-align">
                                <button type="submit" class="btn">Enviar<i class="material-icons small">send</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                    </div>
                </div>
            </div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.modal').modal();
            })
        </script>
    </body>
</html>