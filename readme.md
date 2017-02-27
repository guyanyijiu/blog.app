## 1. 自定义路由文件 : 
```php
app/Providers/RouteServiceProvider.php
```

## 2. 数据库迁移，填充 :
```shell
php artisan make:migration add_header_img_to_users_table --table=users
php artisan migrate

php artisan make:seeder UsersTableSeeder
php artisan db:seed
```
## 3. 使用 elixir
```shell
gulp
```

## 4. 增加自定义全局助手函数
```shell
    增加文件
    app/Helpers/helpers.php
    
    修改 composer.json,在autoload增加
    "files": [
        "app/Helpers/helpers.php"
    ],
    
    执行
    composer dump-auto
```

