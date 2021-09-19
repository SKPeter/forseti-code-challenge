# Forseti Code Challenge
Este projeto isolado foi desenvolvido para um desafio de programação, com o objetivo de buscar e compilar informações do portal do ComprasNet de forma organizada e legível.

## Implantação
É necessário possuir um banco de dados MySQL, além de PHP 7.1 ou acima instalado no ambiente.
1. Importe o arquivo database.sql em um banco de dados MySQL previamente criado. Recomenda-se que o banco de dados esteja no mesmo ambiente da aplicação, caso não esteja, siga o passo 3.5 mais à frente.
2. Extraia todos os outros arquivos neste repositório para uma pasta acessível via HTTP do seu ambiente.
3. Abra em um editor de texto o arquivo environment_sample.php e insira os dados de conexão do banco de dados que foi criado nas linhas 4, 5 e 6 do arquivo. 
    1. Caso o banco de dados não esteja no mesmo ambiente da aplicação, coloque o endereço onde o banco de dados está localizado na linha 7 do arquivo, substituindo o "localhost".
4. Altere o nome do arquivo environnment_sample.php para environment.php
5. Acesse a aplicação no endereço do servidor onde foi feita a instalação.

## Utilização
Ao inicializar o ambiente e acessar a aplicação, uma tabela será exibida, em conjunto a um botão de ação para obter novos artigos do ComprasNet.
Ao clicar no botão, a página será atualizada com os novos artigos que puderem ser obtidos.
