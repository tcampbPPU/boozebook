# BoozeBook

## Installation

There are 2 main options of building application locally
  1. Using local services - php, yarn, mysql, node
  2. VS Code remote containers - VSCode, Docker * Docker Compose


clone from GitHub
run yarn and composer install to install all of your deps
copy .env.example to .env and configure it to your likings

TL;DR
```bash
git clone git@github.com:tcampbPPU/boozebook.git; cd punchbook; yarn; composer install; cp .env.example .env;
```

### Option 1 (Local)

#### Requirements
* PHP 8.1
* Composer - version 2
* Nodejs - version 16.11.0
* Yarn
* MySQL

### Option 2 (VS Code)

#### Requirements
* VSCode
* docker
* docker-compose

1. Install VS Code Remote Dev Extension
[Extension](https://aka.ms/vscode-remote/download/extension)
2. Open Command Paletter (F1) and select *Remote-Containers: Open Folder in Container...*
3. Wait for all containers to start

## Once Setup:

After you have ran install for dependencies (`composer install` && `yarn`)

Run: 

```bash
yarn seed
```

This will run DB migrations and set some faker data.

#### Starting Services
run `yarn dev` in one terminal for our nuxt dev setup

run `yarn api` (alias for ./artisan serve) in another terminal for our laravel API

`localhost:8000` will be api

`localhost:3000` will be frontend


## TESTS
API is tested with PHPUnit can run 

```
composer test
```


### Extras

Can setup OAuth token with Google and set the ID and secret

<!-- For Google -->
```
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```
