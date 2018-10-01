<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link href="css/material_icons.css" rel="stylesheet">
        <link rel="manifest" href="manifest.json">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        <title>Login | Playlist</title>
    </head>
    <body class="blue">
        <div class="content row"><br>
            <div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 center-align blue">
                <ul class="tabs blue darken-4">
                    <li class="tab col s6"><a href="#login">Login</a></li>
                    <li class="tab col s6"><a href="#cadastro">Cadastro</a></li>
                </ul>
            </div>
            <div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 center-align blue">
                
                <div id="login" class="col s12" style="padding:0 !important">
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="col s12 white">
                            <div class="titulo">
                                <br><br>
                                <i class="material-icons large">headset</i>
                                <h3 style="margin-top: -20px;">Efetue Login</h3>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" name="login" id="login">
                                <label for="login">Usuário</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="pass" id="pass">
                                <label for="pass">Senha</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <button class="btn" type="submit">Enviar</button>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="cadastro" class="col s12" style="padding:0 !important">
                    <form action="cadastrar_user.php" method="post" autocomplete="off">
                        <div class="col s12 white">
                            <div class="titulo">
                                <br><br>
                                <i class="material-icons large">account_circle</i>
                                <h3 style="margin-top: -20px;">Cadastre-se!</h3>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">edit</i>
                                <input type="text" name="nm_login" id="nm_login">
                                <label for="nm_login">Nome</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" name="login" id="login">
                                <label for="login">Usuário</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="pass" id="pass">
                                <label for="pass">Senha</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" name="pass_c" id="pass_c">
                                <label for="pass_c">Confirme a Senha</label>
                            </div>
                            <div class="input-field col s10 offset-s1">
                                <button class="btn" type="submit">Enviar</button>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </div>
                <br><br>
                
            </div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.tabs').tabs();
            });
        </script>
    </body>
</html>
<style type="text/css">
    html{
        margin:0;
        padding:0;
    }
    .content{
        width: 100%;
    }
    .tabs a{
        color:white !important;
    }
    .tabs .indicator{
        background-color: white;
    }
</style>