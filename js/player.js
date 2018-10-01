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

    var m_nome = musicas[c][0] + ' - ' + musicas[c][2];
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