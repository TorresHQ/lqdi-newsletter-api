# LQDI Newsletter API 
### Horário de início do projeto: 15:45
### Horário de conlcusão do projeto: 17:00

<br/>
<br/>
<br/>

# Instalação
## Passo 1: Clonar o Repositório

Clone o repositório do projeto Laravel já existente para o seu ambiente local. Você pode fazer isso usando um cliente de controle de versão, como o Git, ou simplesmente baixando o código-fonte do projeto em formato de arquivo ZIP.

## Passo 2: Instalar Dependências

Abra o terminal e navegue até a pasta raiz do projeto clonado.
Execute o comando 
```
composer install
``` 
para instalar as dependências do Laravel. Isso irá instalar todas as bibliotecas e pacotes necessários para o funcionamento do projeto Laravel.

## Passo 3: Configurar o Arquivo .env

Faça uma cópia do arquivo .env.example e renomeie-a para .env na pasta raiz do projeto. Pode usar o comando:
```
cp .env.example .env
```
Abra o arquivo .env e configure as variáveis de ambiente necessárias, como banco de dados, nome do aplicativo, chave de aplicativo, etc., de acordo com a configuração do seu ambiente local.

## Passo 4: Gerar Chave de Aplicativo

No terminal, execute o comando 
```
php artisan key:generate 
```
para gerar uma nova chave de aplicativo para o projeto Laravel.
Isso irá preencher automaticamente a chave de aplicativo no arquivo .env do projeto.

## Passo 5: Executar Migrações e Seeds (se necessário)

Se o projeto Laravel já existente possui migrações e sementes (seeds) para popular o banco de dados, você pode executá-los  usando os comandos respectivamente.
```
php artisan migrate
```
 
```
php artisan db:seed
```
Isso irá criar as tabelas do banco de dados e popular os dados iniciais, se houver.

## Passo 6: Iniciar o Servidor de Desenvolvimento

No terminal, execute o comando 
```
php artisan serve 
```
para iniciar o servidor de desenvolvimento do Laravel.
O Laravel irá criar um servidor de desenvolvimento local na porta padrão 8000 (ou outra porta especificada) e você poderá acessar o aplicativo Laravel em seu navegador através do endereço http://localhost:8000 (ou outra porta especificada).
