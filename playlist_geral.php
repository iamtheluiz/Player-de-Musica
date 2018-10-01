<?php include('init/init.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/nouislider.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/player.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        <title>Playlist Geral | Playlist</title>
    </head>
    <body>
        <div class="content">
            <div class="row" id="corpo">
                <!-- audiotrack, headset, delete, folder -->
                <?php
                    include_once('components/menu.php');
                ?>
                <div class="col s12 blue lighten-1 teste" style="cursor:pointer;">
                    <?php 
                        $musicas = [];
                        $c = 0;

                        $pdo = $sys->pdo;
                        $sql = "SELECT * from tb_musica";
                        $query = $pdo->prepare($sql);
                        $query->execute();

                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                            $nm = $row->nm_musica;
                            $file = $row->url_musica;
                            $banda = $row->nm_banda;
                            $musicas[$c]['nome'] = $nm;
                            $musicas[$c]['src'] = $file;
                            $musicas[$c]['banda'] = $banda;
                            echo "<div id='m".$c."' onclick='selecionarMusica(".($c + 1).")'>";
                            echo "<i class='material-icons'>audiotrack</i>$nm<br>";
                            echo "</div>";
                            $c++;
                        }
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo "<input id='musica_ant' type='hidden' value='0'>";
                        echo "<input id='musica' type='hidden' value='1'>";
                        echo "<input id='duration' type='hidden' value=''>";
                        echo "<input id='status' type='hidden' value='play'>";
                        echo "<audio id='player' preload='none' controls autoplay onended='proximaMusica()' onplay='corzinha_2();' ontimeupdate='range_time()' style='display: none;'>
                                <source id='audio' src='musicas/".$musicas[0]['src']."' type='audio/mpeg'>
                            </audio>";
                    ?>
                </div>
                <div id="botao" class="botao col s12">
                    <div class="col s11">
                        <input type="range" id="time_range" min="0" max="" value="0" step="0.1" onchange="alterar_tempo(this.value)"/>
                    </div>
                    <div class="col s1">
                        <i class="material-icons small" style="cursor: pointer;" onclick="subir_menu()">keyboard_arrow_up</i>
                    </div>
                    <div class="col s12">
                        <div id="nome"></div>
                    </div>
                </div>
                <div id="controles" class="controles col s12 blue lighten-4 player" style="display: none;">
                    <div class="col s12 center center-align">
                        <div id="nome_2"></div>
                    </div>
                    <div class="col s10 offset-s1">
                        <input type="range" id="time_range" min="0" max="" value="0" step="0.1" onchange="alterar_tempo(this.value)"/>
                    </div>
                    <div class="col s1">
                        <i class="material-icons small" style="cursor: pointer;" onclick="descer_menu()">keyboard_arrow_down</i>
                    </div>
                    <div class="col s10 offset-s1">
                        <div class="col s2 offset-s2" style="text-align: right;">
                            <i class='material-icons medium' onclick='voltarMusica();' style="text-align: right; cursor: pointer;">keyboard_arrow_left</i>
                        </div>
                        <div class="col s4" style="text-align: center;">
                            <i id='play' class='material-icons large' onclick='start_pause();' style="text-align: center; cursor: pointer;">pause</i>
                        </div>
                        <div class="col s2" style="text-align: left;">
                            <i class='material-icons medium left-align' onclick="proximaMusica();" style="text-align: left; cursor: pointer;">keyboard_arrow_right</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                selecionarMusica(1);
            });
            var musicas = [];
            <?php 
                $i = 0;
                while($i <= ($c - 1)){
                    echo "musicas[$i] = [];";
                    echo "musicas[$i][0] = '".$musicas[$i]['nome']."';";
                    echo "musicas[$i][1] = 'musicas/".$musicas[$i]['src']."';";
                    echo "musicas[$i][2] = '".$musicas[$i]['banda']."';";
                    $i++;
                }
            ?>
        </script>
    </body>
</html>