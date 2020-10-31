# Welcome to Larva 1.2.0

# What News?

1. Larva console added ☺
you can now create *model*,*repository*,*controller*,*templates* and launch project via command line :

```php
//launch project
php bin/larva  serve
//create a model, repo, controller and template in same command
php bin/larva make User
//create a model
php bin/larva make:model model_name
//create a repository
php bin/larva make:repository repo_name
//create a controller
php bin/larva make:controller controller_name
//create a template
php bin/larva make:template template_name
```

2. Easy upload any file via Alpha:

### what is Alpha?

Alpha is a larva component that help you for file uploading
Example :  
```php

//....
class UploadController extends BaseController
{
    public function upload(Request $request): Render
    {
        //upload verification
        //....
        $alpha = new Alpha();
        $alpha->setRootPath("web/")
        ->setMaxFileSize(2*1024*1024)
        ->addFileExtension("png", "gif")
        ->addFileMimeType("image/png", "image/gif");
        //.....
        $alpha->uploadFile("new_filename", "custom/upload/directory")
    }
}
```

# installation :

```php

//install composer
composer dump-upload
//run project
php -S 127.0.0.1:8001 -t public
```

## databse configuration ##

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
