Player de Música: Streaming de músicas
=======================================

Este player de música basicamente utiliza HTML, PHP, MySql e Javascript
para seu funcionamento. O principal objetivo do projeto acaba sendo 
a busca por conhecimento e prática da codificação.
Este programa opera em um servidor! Sendo uma forma de 'streaming' de
músicas!

Desenvolvimento
---------------

* Comunicação com o banco: Feita por meio do PDO
* Atualmente existe um aquivo chamado 'Sys.php' dentro da pasta 'class',
mas ele não concentra todas as funções do sistema

Utilização
----------

Para que esse player seja executado, é necessária a utilização de 
um servidor web com apache, php e mysql.

* Primeiro é necessário realizar a importação do banco de dados (ele será
encontrado dentro da pasta sql em versões futuras)
* Logo após, verifique a porta de conexão que o PDO está usando dentro do
arquivo 'class/Sys.php' na função 'db_connect'
* Caso deseje adicionar alguma música ao sistema, na raiz do projeto
existe uma pasta 'musicas', adicione suas músicas dentro da mesma
