проект выполнен на php8.0, laravel 9

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
```

После взятия апдейта, что бы верно отображался фронт, то его надо перeсобрать 
````
./vendor/bin/sail npm install (если есть новые пакеты)
./vendor/bin/sail npm run dev
````

Для добавления к системному крону планировщика ларавела, необходимо добавить запись , можно через "crontab -e"
````
* * * * * cd /projects/barter && ./vendor/bin/sail artisan schedule:run >> /dev/null 2>&1
````
(где "/projects/barter" путь до корня к проекту)
