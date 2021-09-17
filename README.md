# Forseti Code Challenge
Este projeto isolado foi desenvolvido para um desafio de programação, com o objetivo de buscar e compilar informações do portal do ComprasNet de forma organizada e legível.

## Implantação
É necessário possuir MySQL e PHP 7.1 ou acima instalados no ambiente.
1. Importe o arquivo database.sql no seu banco de dados MySQL previamente criado.
2. Extraia todos os outros arquivos neste repositório para uma pasta acessível via HTTP do seu ambiente.
3. Abra em um editor de texto o arquivo environment_sample.php nas linhas TODO e insira os dados de conexão do banco de dados que foi criado.
4. Altere o nome do arquivo environnment_sample.php para environment.php

## Utilização
Ao inicializar o ambiente e acessar a aplicação, uma tabela será exibida, em conjunto a um botão de ação para obter novos artigos do ComprasNet.
Ao clicar no botão, a página será atualizada com os novos artigos que puderem ser obtidos.
