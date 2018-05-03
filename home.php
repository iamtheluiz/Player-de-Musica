<?php include('init/init.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="container">
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
                    <div class="caixa col s4 offset-s1 white center center-align">
                        <div class="col s12" style='float:left'>   
                            <i class='material-icons large'>play_circle_filled</i>
                        </div>
                        <div class="col s12" style='float:left'>
                            <p>Teste</p>
                        </div>
                    </div>
                    <div class="caixa col s4 offset-s2 white center center-align">
                        <div class="col s12" style='float:left'>   
                            <i class='material-icons large'>play_circle_filled</i>
                        </div>
                        <div class="col s12" style='float:left'>
                            <p>Teste</p>
                        </div>
                    </div>
                    <div class="caixa col s4 offset-s1 white center center-align">
                        <div class="col s12" style='float:left'>   
                            <i class='material-icons large'>play_circle_filled</i>
                        </div>
                        <div class="col s12" style='float:left'>
                            <p>Teste</p>
                        </div>
                    </div>
                    <div class="caixa col s4 offset-s2 white center center-align">
                        <div class="col s12" style='float:left'>   
                            <i class='material-icons large'>play_circle_filled</i>
                        </div>
                        <div class="col s12" style='float:left'>
                            <p>Teste</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 blue lighten-4 player">
                    <div class="col s12 blue lighten-3 controles center-align">
                       
                    </div>
                </div>
            </div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
            var musicas = [];
            <?php 
                $i = 0;
                while($i <= ($c - 1)){
                    echo "musicas[$i] = [];";
                    echo "musicas[$i][0] = '".$musicas[$i]['nome']."';";
                    echo "musicas[$i][1] = 'musicas/".$musicas[$i]['src']."';";
                    $i++;
                }
            ?>

            function proximaMusica(){
                var teste = document.getElementById('musica').value;
                var soma = parseInt(teste) + 1;
                document.getElementById('player').src = musicas[teste][1];
                document.getElementById('musica').value = soma;
                var mediaElement = document.getElementById('player');
                mediaElement.seekable.start();
            }

            function corzinha(){
                var teste = document.getElementById('musica').value;
                var mus = parseInt(teste) - 1;
                var lista = document.getElementById('m'+mus).style = 'background-color:red';
                var lista = document.getElementById('m'+(mus - 1)).style = '';
            }
        </script>
    </body>
</html>
<style type="text/css">
    html{
        margin:0;
        padding:0;
    }
    .container{
        width: 100%;
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
</style>