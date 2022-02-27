# Descrição do projeto

Este é um projeto-teste da empresa NanoIncub: 
- Detalhes: [link](https://github.com/nanoincub/teste-recrutamento-backend)
## Missão
Desenvolver um Painel Administrativo em PHP para gestão de funcionário e bonificação.

----------
# Tecnologias utilizadas

- Laravel 5.8
- Bootstrap 4.1

## Testado e desenvolvido em:
- Navegador Chrome e Firefox
- Servidor nativo do Laravel:  `php artisan serve`
- Database: MariaDB
----------
# Passo a passo da Instalação
- Clone este projeto
- Certifique-se que o arquivo *.env* esteja presente, caso não esteja copie do arquivo *.env.example*
- Configure o *.env* com as váriaveis de ambiente, sendo principalmente os dados da sua database
- Rode o comando `composer install` para baixar as dependências do Laravel
- Rode o comando `php artisan key:generate` para gerar a chave da aplicação, esta deve aparecer no .env
- Rode o comando `php artisan migrate` para criar as tabelas na database
- Certifique-se que seu usuário tem privilégios de escrita e leitura na pasta */storage* e *bootstrap/cache*
- Caso tenha alguma dúvida na instalação, consulte este link: [Instalação do Laravel](https://laravel.com/docs/5.8#server-requirements)

## Passos iniciais
- Crie sua conta clicando em *register* na página de login
- Cadastre alguns funcionários
- Realize as movimentações

---
# Observações do desenvolvedor para a NanoIncub
- Primeiramente obrigado pela oportunidade independente do resultado da seleção
- O paginate de funcionários e movimentações aparece a partir de 5 registros