<h1 align="center">Welcome to api-games-app 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/php-8.0-blue.svg?cacheSeconds=2592000" />
  <img alt="Version" src="https://img.shields.io/badge/laravel-9.0-red.svg?cacheSeconds=2592000" />
  <a href="https://documenter.getpostman.com/view/13040502/Uz59QL6C#intro" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

> The project consists of a Rest Full API with JSON Web Token (JWT) authentication. Relying on good code standards, use of Traits and Form Request Validation. This project has as main objective a constant study on API elaboration in Laravel.

### 🏠 [Documentation API](https://documenter.getpostman.com/view/13040502/Uz59QL6C#intro)

## Prerequisites

* Docker

## Install

1. Clone your repository, example:

```sh
git clone https://github.com/edvaldotorres/api-games-app
```
2. Change directory into the newly created app/project.

```sh
cd api-games-app
```
3. Install all required dependencies

```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
NOTE: This may take a while if this is the first time installing this as a container.

4. Set the proper permissions to the project files.

```sh
sudo chown -R $USER: .
```
5. Run the servers with Sail

```sh
vendor/bin/sail up -d
```
6. Create a database to be used by this project

> #mysql --password=  --execute='create database api_games_app'
> #exit

7. Copy .env File

```sh
cp .env.example .env
```
8. Open .env to match the following line:

> FROM: DB_HOST=127.0.0.1
  TO: DB_HOST=mysql

9. Generate APP_KEY Key.

```sh
php artisan key:generate
```
10. Build the seed.

```sh
sail artisan migrate:fresh --seed
```
## Usage

1. You can now open your application with API platform: http://localhost/api/login

> E-mail: developer@dev.com.br
> Senha: password
## Author

👤 **Edvaldo Torres de Souza**

* Website: [edvaldotorres.com.br](https://edvaldotorres.com.br/)
* Github: [@edvaldotorres](https://github.com/edvaldotorres)
* LinkedIn: [Edvaldo Torres](https://www.linkedin.com/in/edvaldo-torres-189894150/)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/edvaldotorres/api-games-app/issues). 

## Show your support

Give a ⭐️ if this project helped you!
