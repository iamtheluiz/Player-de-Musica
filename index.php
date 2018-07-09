<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link href="css/material_icons.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
    </head>
    <body class="blue">
        <div class="content">
            <div class="row">
                <br><br>
                <form action="login.php" method="post">
                    <div class="col s10 offset-s1 m8 offset-m2 center-align white">
                        <div class="titulo">
                            <br><br>
                            <i class="material-icons large">headset</i>
                            <h3 style="margin-top: -20px;">Efetue Login</h3>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <input type="text" name="login" id="login">
                            <label for="login">Login</label>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <input type="password" name="pass" id="pass">
                            <label for="pass">Password</label>
                        </div>
                        <div class="input-field col s10 offset-s1">
                            <button class="btn" type="submit">Enviar</button>
                            <br><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
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
</style>