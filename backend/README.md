# API Documentation

## .env Setup

1. Copy .env.example and rename as .env
2. Edit database data, example:
``` dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gymproject
DB_USERNAME=root
DB_PASSWORD=root
```
3. Execute ```php artisan key:generate``` para gerar a chave do Laravel

## Database Setup

Import Migrations in Database:
``` bash
php artisan migrate
```

## Routes

### `/user`
| Method | Route             | Description               | Protection                      |
| ------ | ----------------- | ------------------------- | ------------------------------- |
| POST   | `/member/register`| Register member           | Public                          |
| POST   | `/register`       | Register user             | Public                          |
| POST   | `/admin/register` | Register Admin            | Protected by token and admin validation|
| GET    | `/users`          | Get all Users             | Protected by token and admin validation|
| PATCH  | `/{id}`          | Edit current logged user  | Protected by token               |
| PATCH  | `/{id}/admin`    | Edit users as ADMIN  | Protected by token and admin validation |
| DELETE | `/{id}`          | Delete users as ADMIN  | Protected by token and admin validation |