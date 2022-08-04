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
Посля взятия апдейта , что бы верно отображался фронт, т оего надо персобрать 
````

./vendor/bin/sail npm install (если есть новые пакеты)
./vendor/bin/sail npm run dev
````
