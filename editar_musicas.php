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
                <?php
                    include_once('components/menu.php');
                ?>
                <div class="col s12 blue lighten-1 teste">
                    <div class="col s10 offset-s1" style="margin-top:20px;">
                        <table>
                            <thead class="blue darken-3" style="border-bottom:0px;">
                                <tr>
                                    <th>nm_musica</th>
                                    <th>editar</th>
                                </tr>
                            </thead>
                            <tbody class="blue darken-1">
                                <?php 
                                    $pdo = $sys->pdo;

                                    $sql = "SELECT * from tb_musica";
                                    $query = $pdo->prepare($sql);
                                    $query->execute();

                                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                                        echo "<tr>";
                                        echo "<td>".$row->nm_musica."</td>";
                                        echo "<td><a href='editar_musica.php?cd=$row->cd_musica' class='btn-floating green lighten-1'><i class='material-icons'>edit</i></a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
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