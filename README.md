# Bibliotech

## Requisitos

1. Docker
2. PHP 8.4
3. NodeJs
4. Composer

## 1. Instalando as dependências

### 1.1 PHP

```sh
# MacOS
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"

# Windows PowerShell - Rodar como administrador...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))

# Linux
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

## Composer

Para instalar o composer, siga a documentação oficial em https://getcomposer.org/download

Após instalar o PHP e o Composer, rode o comando abaixo:

```sh
composer install
```

### 1.2 NodeJS

Siga o processo de instação no site oficial: https://nodejs.org/en/download

Após instalar o NodeJS, rode o comando abaixo:

```sh
npm install
```

### 1.3 Docker
Siga o processo de instação no site oficial: https://docs.docker.com/get-started/get-docker/

## 2. Preparando o ambiente

### Variáveis de ambiente

Crie uma copia do aquivo `.env.example` para `.env` como no comando abaixo:

 ```sh
 cp .env.example .env
 ```

`Obs`: Talvez você precise mudar as portas da aplicação, caso já estejam sendo usadas por outro processo.

## 3. Subindo a aplicação

### 3.1 Preparando os containers do docker
Para subir  a aplicação, você precisará apenas de um comando.
Isto criará os containers e o banco de dados:

```sh
docker-compose up -d --build
```

E por fim, rode as migrations e seeders:

```sh
docker-compose exec app php artisan migrate --seed
```

### 3.2 Acessando a aplicação

Para acessa a aplicação abra o endereço http://localhost:80

### 3.3 Testes

Rode os testes através do comando abaixo

```sh
docker-compose exec app php artisan test
```