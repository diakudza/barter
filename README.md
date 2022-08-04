Поднимаем через sail
```
composer install
./vendor/bin/sail up
./vendor/bin/sail npm install
```

Выполнить миграции или использовать дамп
```
./vendor/bin/sail artisan migrate
```

Делал сиды для начальных данных
```
./vendor/bin/sail artisan db:seed
