Player de M�sica: Streaming de m�sicas
=======================================

Este player de m�sica basicamente utiliza HTML, PHP, MySql e Javascript
para seu funcionamento. O principal objetivo do projeto acaba sendo 
a busca por conhecimento e pr�tica da codifica��o.
Este programa opera em um servidor! Sendo uma forma de 'streaming' de
m�sicas!

Desenvolvimento
---------------

* Comunica��o com o banco: Feita por meio do PDO
* Atualmente existe um aquivo chamado 'Sys.php' dentro da pasta 'class',
mas ele n�o concentra todas as fun��es do sistema

Utiliza��o
----------

Para que esse player seja executado, � necess�ria a utiliza��o de 
um servidor web com apache, php e mysql.

* Primeiro � necess�rio realizar a importa��o do banco de dados (ele ser�
encontrado dentro da pasta sql em vers�es futuras)
* Logo ap�s, verifique a porta de conex�o que o PDO est� usando dentro do
arquivo 'class/Sys.php' na fun��o 'db_connect'
* Caso deseje adicionar alguma m�sica ao sistema, na raiz do projeto
existe uma pasta 'musicas', adicione suas m�sicas dentro da mesma
