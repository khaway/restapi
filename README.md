## About project
This is a Rest API test project.

## Requirements

- PHP 7.3
- MySQL

## Setting up with Vagrant

Clone repository:
```bash
git clone https://github.com/khaway/restapi.git
```
Run Vagrant machine (before running machine you need to configure Homestead.yaml):
```bash
vagrant up
vagrant ssh
```
Install composer dependencies:
```bash
composer install
```
Install npm dependencies:
```bash
npm install (yarn install)
```
Build assets:
```bash
npm run production (yarn run production)
```

## Setting up with Docker

Clone repository:
```bash
git clone https://github.com/khaway/restapi.git
```
Configure Docker:
```bash
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
docker-compose up -d nginx mysql
```
Install composer dependencies:
```bash
composer install
```
Install npm dependencies:
```bash
npm install (yarn install)
```
Build assets:
```bash
npm run production (yarn run production)
```
Checkout url:
```bash
http://localhost
```

## Database configure
Database can be configured with:
```bash
.env
```
