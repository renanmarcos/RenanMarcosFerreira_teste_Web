# Criado por Renan Marcos Ferreira

Banco de dados utilizado: PostgreSQL.
Projeto testado num servidor Apache e hospedado no Heroku (com Apache também).

Para replicar o projeto em um sevidor local ou remoto, siga as seguintes instruções:

Crie um novo banco de dados dentro do PostgreSQL com o nome de sua preferência e exporte o arquivo "banco.sql" para ele.

 Depois de ter configurado o servidor, configure uma variável de ambiente no seu Sistema Operacional com o nome 'DATABASE_URL', no seguinte formato:
    
    postgres://usuario:senha@servidor:porta_do_postgre/nome_do_banco

Exemplo no Linux:

```bash
sudo echo "DATABASE_URL=postgres://admin:123@localhost:5432/fastcar" > ~/.bashrc
```

Este projeto pode ser acessado online: https://fast-car.herokuapp.com/