<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">ToDo List</h1>
    <br>
</p>

Sistema simples de gerenciamento de tarefas

Instalação
-------------------

O Sistema está rodando com o Docker




### Docker

Atualizações dos pacotes

    docker-compose run --rm php composer update --prefer-dist

    docker-compose run --rm php composer install    

Iniciar o container

    docker-compose up -d

Acesse a aplicação:

    http://127.0.0.1:8000

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
