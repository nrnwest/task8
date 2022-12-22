### Task8 Race Monaco 2018

Create eloquent models.
You have to decide how many models you have to create.
Create MySQL / MariaDB / Postges database for application and SQLite db for tests.
Write migrations to create a db scheme.
Convert and store data from files to the database.
Write a CLI-command that should parse and save data from files to a database.
Modify previous application to using db.
Write tests using Phpunit. Add code coverage report.

The project needs to be pinked on a Linux or Windows (wsl2 Unbuntu 20.04) platform.
Docker, make must be installed
## Deployment

```bash
git clone https://github.com/nrnwest/task8.git
```

```bash
make dep
````
If an error occurs, run the following commands, errors occur due to weak computer:
1. make build
2. make up
3. make composer
4. make db_add

## wwww
<http://localhost:5000/>

## Swagger REST-api
<http://localhost:5000/api/documentation>

### CoverAge
<http://localhost:5000/coverage/index.html>

### phpMyAdmin
<http://localhost:4444>

## Tests

```bash
make test
````

## To change the front, change the parameter in .env:

RACE_VIEW=adminlte or bootstrap
