[![CircleCI](https://circleci.com/gh/gabrielanhaia/food/tree/master.svg?style=svg&circle-token=4d4445a2f5a510fd9f0d4084359db3748ef8cb75)](https://circleci.com/gh/gabrielanhaia/exads/tree/master)

![](https://img.shields.io/badge/test-passing-green)

## About the project

Small project developed with Laravel. This The idea of ​​the project is to clearly demonstrate the use of Laravel in conjunction with the application of best practices and complete development flow.
The proposal was to Build a RESTFul API where the stores, restaurants, etc can inform at the end of each day the availability of food to be collected.
The places could access the API by a JWT token and make thee requests in a secure way.
Besides that, the system generates a receipt with the information and date when the things will be collected.
 One idea is to try to apply gamification and make people feel happier using the software. 
 
 ## Technologies
 
 - PHP 7.3
 - Laravel Framework
 - Logs/Monolog (It's possible to change the driver from local-files to AWS, etc)
 - PHPUnit
 - Circle CI (Builds)
 - Docker
 
 ## Notes
 
1. Para manter o projeto organizado eu usei o trello e o controle de issues do gitHub. Incluindo o uso de pull requests, etc.
2. Implementei uma camada de repositórios para encapsular o ORM e separar a lógica de negócio das controllers.
3. Implementei um fluxo de integração continua simples para que rodasse os testes unitários no build.
4. Implementei o conceito de uso de DTOs para transportar dados entre a controller e a repositório, assim fica mais fácil de testar e temos um controle maior dos dados (do contrário de utilizar arrays).
5. Estou utilizando login através de tokens JWT.
6. A Api está versionada e tudo está separado por pastas e rotas, assim fica muito mais fácil expandir e atualizar a API no futuro.
7. Implementei de forma centralizada o tratamento de erros da API. Os erros são lançados na repositório e capturados acima de toda a aplicação (pilha).
8. In a real project i would implement much more things to improve the software and the maintenance proccess.

## How do i use it? (With docker).


