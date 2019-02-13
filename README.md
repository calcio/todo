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

    docker-compose run --rm todo-server composer update --prefer-dist

    docker-compose run --rm todo-server composer install    

Iniciar o container

    docker-compose up -d

CONFIGURATÇÃO
-------------

### Permissões

cd todo
sudo chmod 777 -R runtime/
sudo chmod 777 -R web/assets/


### Database

Se precisar edite o arquivo `config/db.php`.

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=todo-db;dbname=todo',
    'username' => 'admin',
    'password' => 'admin',
    'charset' => 'utf8',
];
```

Após verificar as credenciais do banco rodar as migrations com o comando

```docker-compose exec todo-server php yii migrate```

### Acesse a aplicação:

    [http://127.0.0.1:8000](http://127.0.0.1:8000)
