## Простая CRM для учёта бизнес-клиентов.

Установка:
Скачайте проект, выполнив команду
- git clone https://github.com/deyen01/crm.git

обновите зависимости:
- composer update
- npm install

Затем соберите фронтенд командой
- npm run prod

Через php artisan создайте новый ключ приложения.
Создайте файл настроек .env по образцу .env.example и укажите в нём параметры подключения к базе данных.

Создайте пароли для пользователей в файле database/seeders/UserSeeder.php

Выполните миграции и первичное наполнение база данных
- php artisan migrate:fresh --seed
