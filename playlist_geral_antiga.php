<?php include('init/init.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" type="text/css" href="css/nouislider.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript">
            function voltarMusica(){
                var teste = document.getElementById('musica').value;
                var soma = parseInt(teste) - 1;

                document.getElementById('player').src = musicas[(soma - 1)][1];
                document.getElementById('musica').value = soma;
                document.getElementById('musica_ant').value = (soma + 1);
                document.getElementById('status').value = 'play';
                document.getElementById('play').innerHTML = 'pause';
                var mediaElement = document.getElementById('player');
                ajeitar_botao();
            }

            function proximaMusica(){
                var teste = document.getElementById('musica').value;
                var soma = parseInt(teste) + 1;
                document.getElementById('player').src = musicas[teste][1];
                document.getElementById('musica').value = soma;
                document.getElementById('musica_ant').value = (soma - 1);
                document.getElementById('status').value = 'play';
                document.getElementById('play').innerHTML = 'pause';
                var mediaElement = document.getElementById('player');
                ajeitar_botao();
            }

            function corzinha(){
                var teste = document.getElementById('musica').value;
                var mus = parseInt(teste) - 1;
                var lista = document.getElementById('m'+mus).style = 'background-color:red;color:white;';
                var lista = document.getElementById('m'+(mus - 1)).style = '';
            }
            function corzinha_2(){
                var teste = document.getElementById('musica').value;
                var teste_2 = document.getElementById('musica_ant').value;
                var mus = parseInt(teste) - 1;
                var mus_ant = parseInt(teste_2) - 1;
                
                if(mus_ant == -1){

                }else{
                    var lista = document.getElementById('m'+mus_ant).style = '';
                }
                var lista = document.getElementById('m'+mus).style = 'background-color:red;color:white;';

                //Nada a ver com cor
                var duration = document.getElementById('duration');
                var teste = document.getElementById('player');
                duration.value = teste.duration;
                set_time();
                set_name();
            }

            function selecionarMusica(cd){
                var teste = document.getElementById('musica');
                var teste_2 = document.getElementById('musica_ant');
                document.getElementById('player').src = musicas[(cd - 1)][1];
                teste_2.value = teste.value;
                teste.value = cd;
                corzinha_2();
                document.getElementById('status').value = 'play';
                document.getElementById('play').innerHTML = 'pause';
                ajeitar_botao();
            }

            function set_time(){
                var duration = document.getElementById('duration');
                var tempo = duration.value;
                var time_range = document.getElementById('time_range');
                time_range.setAttribute('max',tempo);
            }

            function range_time(){
                var teste = document.getElementById('player');
                var tempo = teste.duration;
                var tempo_corrido = teste.currentTime;
                //var range = (100 * tempo_corrido)/tempo;
                var time_range = document.getElementById('time_range');
                time_range.value = tempo_corrido;
            }
            function set_name(){
                var nome = document.getElementById('nome');
                var nome2 = document.getElementById('nome_2');
                var c = parseInt(document.getElementById('musica').value);
                c--;

                var m_nome = musicas[c][0];
                nome.innerHTML = m_nome;
                nome2.innerHTML = m_nome;
            }

            function subir_menu(){
                var botao = document.getElementById('botao');
                botao.style = "display:none";
                var controles = document.getElementById('controles');
                controles.style = "position: fixed; display: all; bottom:0;";

                var corpo = document.getElementById('corpo');
                corpo.style = 'padding-bottom:100px;'
            }
            function descer_menu(){
                var botao = document.getElementById('botao');
                botao.style = "display:all";
                var controles = document.getElementById('controles');
                controles.style = "position: fixed; display: none; bottom:0;";
                var corpo = document.getElementById('corpo');
                corpo.style = 'padding-bottom:0px;'
            }

            function alterar_tempo(temp){
                var teste = document.getElementById('player');
                teste.currentTime = temp;   
            }
            function start_pause(){
                var status = document.getElementById('status').value;
                var botao = document.getElementById('play');
                if(status == 'play'){
                    document.getElementById('player').pause();
                    document.getElementById('status').value = 'pause';
                    botao.innerHTML = 'play_arrow';
                }else{
                    document.getElementById('player').play();
                    document.getElementById('status').value = 'play';
                    botao.innerHTML = 'pause';
                }
            }
            function ajeitar_botao(){
                var status = document.getElementById('status').value;
                var botao = document.getElementById('play');
                if(status == 'play'){
                    botao.innerHTML = 'pause';
                }else{
                    botao.innerHTML = 'play_arrow';
                }
            }
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
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
                        $c = -2;

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
                                }
                                $c++;
                            }
                            echo '<br>';
                            echo '<br>';
                            echo '<br>';
                            closedir($dir);
                            echo "<input id='musica_ant' type='hidden' value='0'>";
                            echo "<input id='musica' type='hidden' value='1'>";
                            echo "<input id='duration' type='hidden' value=''>";
                            echo "<input id='status' type='hidden' value='play'>";
                            echo "<audio id='player' controls autoplay onended='proximaMusica()' onplay='corzinha_2();' ontimeupdate='range_time()' style='display: none;'>
                                    <source id='audio' src='musicas/".$musicas[0]['src']."' type='audio/mpeg'>
                                </audio>";
                        }
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
                    <div class="col s12">
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
                    $i++;
                }
            ?>
        </script>
    </body>
</html>
<style type="text/css">
    html{
        margin:0;
        padding:0;
        overflow-x: hidden;
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
    .botao{
        position: fixed;
        bottom: 0;
        background-color: #0EB983;
    }
    .controles{
        position: fixed;
        bottom:0;
    }
    input[type="range"] {
        background-color: rgba(0,0,0,0);
        border:none;
    }
    input[type="range" i] {
        background-color: rgba(0,0,0,0) !important;
        border:none;
    }
</style>