# Larva a small base PHP MVC Framework

# installation :
```
//install composer
composer dump-autoload
//run project
php -S 127.0.0.1:8001 -t public
```

## databse configuration :
configure database in config/databse.json
```json
{
    "hostname": "localhost",
    "dbname": "project1",
    "username": "root",
    "password": ""
}
```


## PDOFactory :

**PDOFactory::createTable(array $table)** is used to create database tables.

```php
$pdo = Database::getPDO();
$table = [];
$table[0] = "CREATE TABLE user .....";
//.......
$pdo->createTable($table);
```