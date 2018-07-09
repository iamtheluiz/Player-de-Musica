<?php include('init/init.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/material_icons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="content">
            <div class="row">
                <!-- audiotrack, headset, delete, folder, play_circle_filled -->
                <div class="col s12 blue topo">
                    <div class="home">
                        <a href="home.php"><i class="material-icons">home</i></a>
                    </div>
                    <div class="menu">
                        <a href="home.php">Geral</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                <div class="col s12 blue lighten-1 teste">
                    <div class="col s10 offset-s1">
                        <div class="caixa col s8 white center center-align offset-s2">
                            <a href="playlist_geral.php">
                                <div class="col s12" style='float:left'>   
                                    <i class='material-icons large'>play_circle_filled</i>
                                </div>
                                <div class="col s12" style='float:left'>
                                    <p>Playlist<br>Geral</p>
                                </div>
                            </a>
                        </div>
                        <!-- <div class="caixa col s8 offset-s2 white center center-align">
                            <a href="playlist_geral.php">
                                <div class="col s12" style='float:left'>   
                                    <i class='material-icons large'>play_circle_filled</i>
                                </div>
                                <div class="col s12" style='float:left'>
                                    <p>Playlist Geral</p>
                                </div>
                            </a>
                        </div> -->
                        <?php 
                            $pdo = $sys->pdo;
                            $sql = "SELECT * from tb_playlist";
                            $query = $pdo->prepare($sql);
                            $query->execute();

                            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                                echo '<div class="caixa col s8 white center center-align offset-s2">
                                    <a href="ver_playlist.php?cd='.$row['cd_playlist'].'">
                                        <div class="col s12" style="float:left">   
                                            <i class="material-icons large">play_circle_filled</i>
                                        </div>
                                        <div class="col s12" style="float:left">
                                            <p>'.$row['nm_playlist'].'</p>
                                        </div>
                                    </a>
                                </div>';
                            }
                        ?>
                        <div class="caixa col s8 red center center-align offset-s2">
                            <a href="#modal1" class="waves-effect red modal-trigger">
                                <div class="col s12 white-text" style='float:left'>   
                                    <i class='material-icons large'>add</i>
                                </div>
                                <div class="col s12 white-text" style='float:left'>
                                    <p>Criar<br>Playlist</p>
                                </div>
                            </a>
                        </div>
                        <div class="caixa col s8 red center center-align offset-s2">
                            <a href="editar_musicas.php" class="waves-effect red modal-trigger">
                                <div class="col s12 white-text" style='float:left'>   
                                    <i class='material-icons medium'>edit</i>
                                </div>
                                <div class="col s12 white-text" style='float:left'>
                                    <p>Editar<br>Musicas</p>
                                </div>
                            </a>
                        </div>
                    </div>
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
<style type="text/css">
    html{
        margin:0;
        padding:0;
    }
    .topo{
        height: 25px;
        line-height: 25px;  
    }
    .home{
        float:left;
        width: 20%;
    }
    .menu{
        float:left;
        width: 79%;
        text-align: right;
        padding-right: 1%;
    }
    .home i{
        color:white;
    }
    .menu a{
        color:white;
        text-decoration: none;
        font-size: 8pt;
    }
    .caixa{
        margin-top:10px;
    }
    .caixa a{
        color:black;
    }
</style>
